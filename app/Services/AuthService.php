<?php
namespace App\Services;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function createAuth(AuthRequest $authRequest)
    {
        $credentials = $authRequest->validated();

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            $user = Auth::user();

            $responseData = [
                'message' => __('messages.welcome'),
                'user'    => $user,
            ];

            return $responseData;
        }
    }
}
