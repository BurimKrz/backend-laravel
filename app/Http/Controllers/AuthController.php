<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Services\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mailer\Transport\Smtp\Auth\AuthenticatorInterface;

class AuthController extends Controller
{
    public function login(AuthRequest $authRequest, AuthInterface $authInterface)
    {
        return response()->json($authInterface->createAuth($authRequest));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
