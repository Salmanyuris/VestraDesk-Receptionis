<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Visit;
use App\Models\Guest;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VisitTest extends TestCase
{
    use RefreshDatabase;

    public function it_can_create_a_visit()
    {
        $guest = Guest::factory()->create();
        $employee = Employee::factory()->create();

        $visit = Visit::create([
            'guest_id' => $guest->id,
            'employee_id' => $employee->id,
            'check_in' => now(),
            'purpose' => 'Meeting bisnis',
            'status' => 'checked_in'
        ]);

        $this->assertInstanceOf(Visit::class, $visit);
        $this->assertEquals('checked_in', $visit->status);
        $this->assertEquals('Meeting bisnis', $visit->purpose);
        $this->assertEquals($guest->id, $visit->guest_id);
        $this->assertEquals($employee->id, $visit->employee_id);
    }

    public function it_belongs_to_guest()
    {
        $guest = Guest::factory()->create();
        $employee = Employee::factory()->create();
        
        $visit = Visit::factory()->create([
            'guest_id' => $guest->id,
            'employee_id' => $employee->id
        ]);

        $this->assertInstanceOf(Guest::class, $visit->guest);
        $this->assertEquals($guest->id, $visit->guest->id);
        $this->assertEquals($guest->name, $visit->guest->name);
    }

    public function it_belongs_to_employee()
    {
        $employee = Employee::factory()->create();
        $guest = Guest::factory()->create();
        
        $visit = Visit::factory()->create([
            'employee_id' => $employee->id,
            'guest_id' => $guest->id
        ]);

        $this->assertInstanceOf(Employee::class, $visit->employee);
        $this->assertEquals($employee->id, $visit->employee->id);
        $this->assertEquals($employee->name, $visit->employee->name);
    }

    public function it_calculates_duration_correctly()
    {
        $guest = Guest::factory()->create();
        $employee = Employee::factory()->create();
        
        $checkIn = now()->subHours(2)->subMinutes(30);
        $checkOut = now();
        
        $visit = Visit::factory()->create([
            'guest_id' => $guest->id,
            'employee_id' => $employee->id,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'status' => 'checked_out'
        ]);

        $this->assertEquals('2h 30m', $visit->duration);
    }

    public function it_returns_null_duration_when_not_checked_out()
    {
        $guest = Guest::factory()->create();
        $employee = Employee::factory()->create();
        
        $visit = Visit::factory()->create([
            'guest_id' => $guest->id,
            'employee_id' => $employee->id,
            'check_out' => null,
            'status' => 'checked_in'
        ]);

        $this->assertNull($visit->duration);
    }

    public function it_requires_guest_and_employee()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Visit::create([
            'check_in' => now(),
            'purpose' => 'Test purpose',
            'status' => 'checked_in'
        ]);
    }
}