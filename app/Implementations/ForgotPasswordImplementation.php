<?php

namespace App\Implementations;

use App\Services\ChangeLanguageService;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\ForgotPasswordRequest;
use App\Interfaces\PasswordInterface;
use App\Models\User;

class ForgotPasswordImplementation implements PasswordInterface{

    public function resetPassword(ForgotPasswordRequest $forgotPassword, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);
        
        $email = $forgotPassword -> email;
        $newPassword = $forgotPassword -> newPassword;
        $confirmPassword = $forgotPassword -> confirmPassword;

        $user = User::where('email', $email)->first();

        if(!$user){
            return __('messages.userNotExist');
        }

        if(Hash::check($newPassword, $user->password)){
            return __('messages.newPass');
        }
        if ($newPassword == $confirmPassword){
            $user->password  = bcrypt($newPassword);
            $user->save();

            return __('messages.pass');
        }
    }
}