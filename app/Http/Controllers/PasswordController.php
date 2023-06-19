<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Interfaces\PasswordInterface;
use Illuminate\Support\Facades\App;

class PasswordController extends Controller
{
    private PasswordInterface $passwordInterface;

    public function __construct(PasswordInterface $passwordInterface)
    {
        $this->passwordInterface = $passwordInterface;
    }

    public function password(ForgotPasswordRequest $forgotPassword, $languageId)
    {
        return response()->json($this->passwordInterface->resetPassword($forgotPassword, $languageId));
    }
}
