<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => 1,
            "guest_name" => fake()->name(),
            "guest_phone" => fake()->phoneNumber(),
            "guest_num_attend" => fake()->numberBetween(1, 10),
            "guest_prayer" => fake()->text(200)
        ];
    }
}
