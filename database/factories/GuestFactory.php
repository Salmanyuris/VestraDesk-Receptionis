<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuestFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'company' => $this->faker->optional()->company,
            'phone' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->optional()->safeEmail,
            'photo' => null,
            'id_card_number' => $this->faker->optional()->numerify('################'),
            'id_card_photo' => null,
        ];
    }
}