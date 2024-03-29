<?php

namespace Database\Factories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Countrie>
 */

use Illuminate\Database\Eloquent\Factories\Factory;

class CountriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country' => $this->faker->unique()->country,
        ];
    }
}
