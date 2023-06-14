<?php
namespace App\Implementations;

use App\Http\Requests\TokenRequest;
use App\Interfaces\TokenInterface;
use App\Models\Token;
use App\Models\UsersToken;

class TokenImplementation implements TokenInterface
{

    public function tokenUpdate(TokenRequest $tokenRequest, $user_id, $language)
    {
        $userToken = UsersToken::where('user_id', $user_id)->first();
        if (!$userToken) {
            return response()->json(__('messages.token'), 404);
        }

        $token         = Token::findOrFail($userToken->token_id);
        $token->amount = $tokenRequest->amount;
        $token->save();
        return $token->amount;
    }

}
