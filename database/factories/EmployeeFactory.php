<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'department' => $this->faker->randomElement(['IT', 'HR', 'Marketing', 'Finance', 'Operations']),
            'position' => $this->faker->jobTitle,
            'email' => $this->faker->unique()->companyEmail,
            'phone' => $this->faker->phoneNumber,
            'photo' => null,
            'status' => true,
        ];
    }
}