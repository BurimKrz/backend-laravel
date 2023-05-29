<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use App\Models\token;
use App\Models\usersToken;
use App\Services\Interfaces\TokenInterface;

class TokenController extends Controller
{

    public function token(TokenInterface $tokenInterface, $id)
    {
        return response()->json([$tokenInterface->showToken($id), 200]);
    }

    public function updateToken(TokenRequest $tokenRequest, TokenInterface $tokenInterface, $user_id)
    {
        return response()->json([$tokenInterface->tokenUpdate($tokenRequest, $user_id)], 200);

    }

}
