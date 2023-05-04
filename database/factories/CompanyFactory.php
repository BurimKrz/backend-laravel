<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\company>
 */
use App\Models\company;
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'keywords' => $this->faker->words(2, true),
            'country' => $this->faker->name(),
            'web_adress' => $this->faker->words(2, true),
            'more_info' => $this->faker->sentence(10),
            'budged' => $this->faker->randomNumber(5),
            'type' => $this->faker->words(2, true),
            'taxpayer_office' => $this->faker->randomNumber(3),
            'category_id' => $this->faker->randomElement([1, 2, 3, 4]),
'subcategory_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'TIN' => $this->faker->randomNumber(2)

        ];
    }
}
