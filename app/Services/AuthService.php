<?php
namespace App\Services;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function createAuth(AuthRequest $authRequest, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);

        $credentials = $authRequest->validated();

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            $user = [
                'message' => __('messages.welcome'),
                'user'    => Auth::user(),
            ];

            return $user;
        }

        return response()->json(['error' => __('messages.error')], 401);
    }

}
