<?php

namespace Database\Factories;

use App\Models\Guest;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitFactory extends Factory
{
    public function definition()
    {
        return [
            'guest_id' => Guest::factory(),
            'employee_id' => Employee::factory(),
            'check_in' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'check_out' => $this->faker->optional()->dateTimeBetween('now', '+1 day'),
            'purpose' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['checked_in', 'checked_out']),
            'notes' => $this->faker->optional()->paragraph,
            'badge_printed' => $this->faker->optional()->dateTime,
        ];
    }
}