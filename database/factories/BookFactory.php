<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
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
            "address" => fake()->randomElement(["A1", "A2", "B", "C1", "C2", "C3"]),
            "category" => fake()->randomElement(["Conte", "Developpement", "Roman"]),
            "summary" => fake()->paragraph,
            "isAvailable" => fake()->boolean,
            "isLost" => fake()->boolean,
            "special" => fake()->boolean,
            "librarian_id" => fake()->numberBetween(1, 10),
            "author_id" => fake()->numberBetween(1, 10),
            "microfilm_id" => fake()->unique(true)->numberBetween(1, 10),
        ];
    }
}
