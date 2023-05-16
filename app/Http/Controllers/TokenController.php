<?php

namespace App\Http\Controllers;

use App\Models\token;
use Illuminate\Http\Request;

class TokenController extends Controller
{

    public function token($id)
    {
        $user_token = Token::select('token_coin.id', 'token_coin.amount')
            ->join('users_token', 'token_coin.id', '=', 'users_token.token_id')
            ->join('users', 'users.id', '=', 'users_token.user_id')
            ->where('users.id', '=', $id)
            ->first();

        return response()->json($user_token);
    }

    public function updateToken($id, $value)
    {
        $token = Token::findOrFail($id);
        if ($token->amount < $value) {
            return response()->json(['error' => 'Insufficient tokens'], 400);
        } else {
            $token->amount -= $value;
            $token->save();
            return response()->json(['token' => $token]);
        }

    }
    
}
