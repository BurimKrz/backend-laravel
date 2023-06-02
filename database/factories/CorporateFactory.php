<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Corporate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Corporate>
 */
class CorporateFactory extends Factory
{/**
 * The name of the factory's corresponding model.
 *
 * @var string
 */
    protected $model = Corporate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'short_history'   => $this->faker->text(400),
            'mission'         => $this->faker->sentence(),
            'vision'          => $this->faker->sentence(),
            'responsibility'  => $this->faker->sentence(),
            'export_stories'  => $this->faker->sentence(),
            'human_resources' => $this->faker->sentence(),
            'bank_accounts'   => $this->faker->sentence(),
            'our_bands'       => $this->faker->sentence(),
            'company_id'      => Company::inRandomOrder()->first()->id,
        ];
    }
}
