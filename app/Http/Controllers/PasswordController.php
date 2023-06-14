<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForgotPasswordRequest;
use App\Interfaces\PasswordInterface;

class PasswordController extends Controller
{
     private PasswordInterface $passwordInterface;

     public function __construct(PasswordInterface $passwordInterface){
        $this->passwordInterface = $passwordInterface;
     }

     public function password (ForgotPasswordRequest $forgotPassword){
        return response() -> json($this->passwordInterface->resetPassword($forgotPassword));
     }
}
