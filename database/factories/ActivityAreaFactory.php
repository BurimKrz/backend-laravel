<?php

namespace Database\Factories;

use App\Models\ActivityArea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActivityArea>
 */
class ActivityAreaFactory extends Factory
{
    protected $model = ActivityArea::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Exporter', 'Importer', 'Servicer', 'Retailer', 'Wholesaler', 'Manifacturer',
            ]),
        ];
    }
}
