<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\token;

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
            'user_id' => User::factory()->create()->id,
            'token_id' => Token::factory()->create()->id,
        ];
    }
}
