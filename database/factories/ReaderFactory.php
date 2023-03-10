<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reader>
 */
class ReaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "inUse" => fake()->boolean,
            "isAvailable" => fake()->boolean,
            "librarian_id" => fake()->numberBetween(1, 10),
        ];
    }
}
