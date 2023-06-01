<?php
namespace App\Implementations;

use App\Http\Requests\TokenRequest;
use App\Interfaces\TokenInterface;
use App\Models\token;
use App\Models\usersToken;

class TokenImplementation implements TokenInterface
{

    public function tokenUpdate(TokenRequest $tokenRequest, $user_id)
    {
        $userToken = usersToken::where('user_id', $user_id)->first();
        if (!$userToken) {
            return response()->json(['error' => 'User token not found'], 404);
        }

        $token         = token::findOrFail($userToken->token_id);
        $token->amount = $tokenRequest->amount;
        $token->save();
        return $token->amount;
    }

}
