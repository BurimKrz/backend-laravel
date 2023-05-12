<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\token;
use App\Models\User;

class TokenController extends Controller
{
   

    function token($id)
    {
        $user_token = Token::select('token_coin.id','token_coin.amount')
            ->join('users_token', 'token_coin.id', '=', 'users_token.token_id')
            ->join('users', 'users.id', '=', 'users_token.user_id')
            ->where('users.id', '=', $id)
            ->first();
            
        return response()->json( $user_token);
    }

    public function updateToken(Request $request, $id) {      

        $token = Token::findOrFail($id);
        $validated = $request->validate(['amount' => 'required|integer']);
        $token -> amount = $validated['amount'];
        $token->save(); 
        return response()->json(['token' => $token]);
    }
}