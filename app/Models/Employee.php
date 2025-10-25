<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department',
        'position',
        'email',
        'phone',
        'photo',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }

    public function getPhotoUrlAttribute(): string
    {
        return $this->photo ? asset('storage/' . $this->photo) : asset('images/default-avatar.png');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }
}