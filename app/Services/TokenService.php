<?php
namespace App\Services;

use App\Models\Token;

class TokenService
{
    public function showToken($id)
    {
        $user_token = Token::join('users_token', 'token_coin.id', 'users_token.token_id')
            ->join('users', 'users.id', 'users_token.user_id')
            ->where('users.id', $id)
            ->first(['token_coin.id', 'token_coin.amount']);

        return response()->json($user_token);
    }

}
