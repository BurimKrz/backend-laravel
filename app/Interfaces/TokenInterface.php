<?php 
namespace App\Interfaces;
use App\Http\Requests\TokenRequest;

interface TokenInterface{

    public function tokenUpdate(TokenRequest $tokenRequest, $user_id, $languageId);
}