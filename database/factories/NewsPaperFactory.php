<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsPaper>
 */
class NewsPaperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => fake()->sentence,
            "librarian_id" => fake()->numberBetween(1, 10),
            // "microfilm_id" => fake()->unique(true)->numberBetween(1, 10),
        ];
    }
}
