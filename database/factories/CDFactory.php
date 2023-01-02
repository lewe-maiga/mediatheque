<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CD>
 */
class CDFactory extends Factory
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
            "summary" => fake()->paragraph,
            "category" => fake()->randomElement(["Encyclopedie", "Visite de musées", "Jungle"]),
            "duration" => fake()->numberBetween(40, 230),
            "isAvailable" => fake()->boolean,
            "isLost" => fake()->boolean,
            "caution" => fake()->numberBetween(40, 1500),
            "librarian_id" => fake()->numberBetween(1, 10),
            "author_id" => fake()->numberBetween(1, 10),
        ];
    }
}
