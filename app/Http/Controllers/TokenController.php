<?php

namespace App\Http\Controllers;

use App\Models\token;
use App\Models\usersToken;
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

    public function updateToken(Request $request, $user_id)
    {
       
        $validated = $request->validate([
            'amount' => 'required|integer',
        ]);
        $userToken = usersToken::where('user_id', $user_id)->first();
        if (!$userToken) {
            return response()->json(['error' => 'User token not found'], 404);
        }

        $token = Token::findOrFail($userToken->token_id);
        $token->amount = $validated['amount'];
        $token->save();
        return response()->json(['amount' => $token->amount]);

    }

}
