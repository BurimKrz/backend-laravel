<?php

namespace App\Implementations;

use Illuminate\Support\Facades\Hash;

use App\Http\Requests\ForgotPasswordRequest;
use App\Interfaces\PasswordInterface;
use App\Models\User;

class ForgotPasswordImplementation implements PasswordInterface{

    public function resetPassword(ForgotPasswordRequest $forgotPassword)
    {
        $email = $forgotPassword -> email;
        $newPassword = $forgotPassword -> newPassword;
        $confirmPassword = $forgotPassword -> confirmPassword;

        $user = User::where('email', $email)->first();

        if(!$user){
            return 'This user does not exist';
        }

        if(Hash::check($newPassword, $user->password)){
            return 'New password must be different from the current password.';
        }
        if ($newPassword == $confirmPassword){
            $user->password  = bcrypt($newPassword);
            $user->save();

            return 'Password changed successfully';
        }
    }
}