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

    public function updateToken(Request $request, $id)
    {
        if ($user) {
            $token = Token::create([
                'amount' => 100
            ]);
        
            UsersToken::create([
                'user_id'  => $user->id,
                'token_id' => $token->id
            ]);
        }
        return response()->json(['amount' => $token]);

    }

}
