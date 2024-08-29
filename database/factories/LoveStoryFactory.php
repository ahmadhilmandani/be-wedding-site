<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoveStory>
 */
class LoveStoryFactory extends Factory
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
            "love_story_header" => fake()->title(),
            "love_story_desc" => fake()->text(),
            "love_story_date" => fake()->date()
        ];
    }
}
