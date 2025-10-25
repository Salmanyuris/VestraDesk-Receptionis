<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'employee_id',
        'check_in',
        'check_out',
        'purpose',
        'status',
        'notes',
        'badge_printed',
    ];

    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function getDurationAttribute(): ?string
    {
        if ($this->check_out) {
            $interval = $this->check_in->diff($this->check_out);
            return $interval->format('%hh %im');
        }
        return null;
    }
}