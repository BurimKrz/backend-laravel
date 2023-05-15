<?php

namespace Database\Factories;

use App\Models\token;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UsersToken>
 */
class UsersTokenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'user_id'    => User::inRandomOrder()->first()->id,
            'token_id' => token::inRandomOrder()->first()->id,
        ];
    }
}
