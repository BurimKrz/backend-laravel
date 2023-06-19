<?php

namespace App\Interfaces;
use App\Http\Requests\ForgotPasswordRequest;

interface PasswordInterface{
    public function resetPassword(ForgotPasswordRequest $forgotPassword, $languageId);
}
