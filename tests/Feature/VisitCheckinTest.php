<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;

class VisitCheckinTest extends TestCase
{
    use RefreshDatabase;

    public function guest_can_check_in_successfully()
    {
        $employee = Employee::factory()->create();

        $response = $this->postJson('/visits/checkin', [
            'name' => 'John Doe',
            'phone' => '081234567890',
            'email' => 'john@example.com',
            'company' => 'Test Company',
            'employee_id' => $employee->id,
            'purpose' => 'Meeting bisnis'
        ]);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'message' => 'Check-in berhasil! Selamat datang John Doe'
                ]);

        $this->assertDatabaseHas('guests', [
            'name' => 'John Doe',
            'phone' => '081234567890'
        ]);

        $this->assertDatabaseHas('visits', [
            'purpose' => 'Meeting bisnis',
            'status' => 'checked_in'
        ]);
    }

    public function it_requires_name_phone_employee_id_and_purpose()
    {
        $response = $this->postJson('/visits/checkin', []);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['name', 'phone', 'employee_id', 'purpose']);
    }

    public function it_creates_new_guest_if_not_exists()
    {
        $employee = Employee::factory()->create();

        $response = $this->postJson('/visits/checkin', [
            'name' => 'Jane Smith',
            'phone' => '081234567891',
            'employee_id' => $employee->id,
            'purpose' => 'Interview'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseCount('guests', 1);
        $this->assertDatabaseHas('guests', [
            'name' => 'Jane Smith',
            'phone' => '081234567891'
        ]);
    }

    public function it_updates_existing_guest_information()
    {
        $employee = Employee::factory()->create();
        
        // Create guest first
        $this->postJson('/visits/checkin', [
            'name' => 'Old Name',
            'phone' => '081234567892',
            'employee_id' => $employee->id,
            'purpose' => 'First visit'
        ]);

        // Update guest information
        $response = $this->postJson('/visits/checkin', [
            'name' => 'Updated Name',
            'phone' => '081234567892', // Same phone
            'employee_id' => $employee->id,
            'purpose' => 'Second visit'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('guests', [
            'phone' => '081234567892',
            'name' => 'Updated Name' // Name should be updated
        ]);
        $this->assertDatabaseCount('guests', 1); // Still only one guest
    }
}