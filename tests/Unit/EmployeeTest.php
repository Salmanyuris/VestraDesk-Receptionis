<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Employee;
use App\Models\Visit;
use App\Models\Guest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function it_can_create_an_employee()
    {
        $employee = Employee::factory()->create([
            'name' => 'Jane Smith',
            'department' => 'IT',
            'position' => 'Software Developer',
            'email' => 'jane@company.com'
        ]);

        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertEquals('Jane Smith', $employee->name);
        $this->assertEquals('IT', $employee->department);
        $this->assertEquals('Software Developer', $employee->position);
        $this->assertEquals('jane@company.com', $employee->email);
        $this->assertTrue($employee->status);
    }

    public function it_has_visits_relationship()
    {
        $employee = Employee::factory()->create();
        $guest = Guest::factory()->create();
        
        $visit = Visit::factory()->create([
            'employee_id' => $employee->id,
            'guest_id' => $guest->id
        ]);

        $this->assertTrue($employee->visits->contains($visit));
        $this->assertEquals(1, $employee->visits->count());
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $employee->visits);
    }

    public function it_returns_photo_url_attribute()
    {
        $employee = Employee::factory()->create(['photo' => 'employees/photo.jpg']);
        
        $this->assertEquals(asset('storage/employees/photo.jpg'), $employee->photo_url);
    }

    public function it_returns_default_photo_when_no_photo()
    {
        $employee = Employee::factory()->create(['photo' => null]);
        
        $this->assertEquals(asset('images/default-avatar.png'), $employee->photo_url);
    }

    public function it_can_be_inactive()
    {
        $employee = Employee::factory()->create(['status' => false]);

        $this->assertFalse($employee->status);
    }

    public function it_can_scope_active_employees()
    {
        Employee::factory()->count(3)->create(['status' => true]);
        Employee::factory()->count(2)->create(['status' => false]);

        $activeEmployees = Employee::active()->get();
        
        $this->assertCount(3, $activeEmployees);
        $this->assertTrue($activeEmployees->every(fn($employee) => $employee->status === true));
    }
}