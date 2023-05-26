<?php 
namespace App\Services\Interfaces;
use App\Http\Requests\TokenRequest;

interface TokenInterface{

    public function showToken($id);

    public function tokenUpdate(TokenRequest $tokenRequest, $user_id);
}