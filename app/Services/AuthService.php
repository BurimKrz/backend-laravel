<?php
namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Services\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function createAuth(AuthRequest $authRequest)
    {

        $credentials = $authRequest->validated();

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            $user = [
                'message' => 'Welcome new user',
                'user'    => Auth::user(),
            ];

            return $user;
        }

        return response()->json(['error' => 'The provided credentials are incorrect'], 401);
    }

}
