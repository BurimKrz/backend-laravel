<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use App\Interfaces\TokenInterface;
use App\Services\TokenService;
use Illuminate\Support\Facades\App;

class TokenController extends Controller
{
    private TokenInterface $tokenInterface;
    private TokenService $tokenService;

    public function __construct(TokenInterface $tokenInterface, TokenService $tokenService){
        $this->tokenInterface = $tokenInterface;
        $this->tokenService = $tokenService;
    }
    public function token(TokenService $tokenService, $id)
    {
        return response()->json($this->tokenService->showToken($id), 200);
    }

    public function updateToken(TokenInterface $tokenInterface, TokenRequest $tokenRequest, $user_id, $language)
    {
        $locale = config('app.available_locales');
        App::setLocale($locale[$language]);
        return response()->json($this->tokenInterface->tokenUpdate($tokenRequest, $user_id, $language));
    }

}
