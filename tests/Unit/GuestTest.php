<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Guest;
use App\Models\Visit;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuestTest extends TestCase
{
    use RefreshDatabase;

    public function it_can_create_a_guest()
    {
        $guest = Guest::factory()->create([
            'name' => 'John Doe',
            'phone' => '081234567890'
        ]);

        $this->assertInstanceOf(Guest::class, $guest);
        $this->assertEquals('John Doe', $guest->name);
        $this->assertEquals('081234567890', $guest->phone);
    }

    public function it_has_visits_relationship()
    {
        $guest = Guest::factory()->create();
        $employee = Employee::factory()->create();

        $visit = Visit::factory()->create([
            'guest_id' => $guest->id,
            'employee_id' => $employee->id
        ]);

        $this->assertTrue($guest->visits->contains($visit));
        $this->assertEquals(1, $guest->visits->count());
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $guest->visits);
    }

    public function it_returns_photo_url_attribute()
    {
        $guest = Guest::factory()->create(['photo' => 'guests/photo.jpg']);
        
        $this->assertEquals(asset('storage/guests/photo.jpg'), $guest->photo_url);
    }

    public function it_returns_default_photo_when_no_photo()
    {
        $guest = Guest::factory()->create(['photo' => null]);
        
        $this->assertEquals(asset('images/default-avatar.png'), $guest->photo_url);
    }

    public function it_can_have_multiple_visits()
    {
        $guest = Guest::factory()->create();
        $employee = Employee::factory()->create();

        $visit1 = Visit::factory()->create([
            'guest_id' => $guest->id,
            'employee_id' => $employee->id
        ]);

        $visit2 = Visit::factory()->create([
            'guest_id' => $guest->id,
            'employee_id' => $employee->id
        ]);

        $this->assertCount(2, $guest->visits);
        $this->assertTrue($guest->visits->contains($visit1));
        $this->assertTrue($guest->visits->contains($visit2));
    }
}