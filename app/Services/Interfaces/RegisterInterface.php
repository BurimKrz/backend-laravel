<?php
namespace App\Services\Interfaces;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UsersTokenRequest;

interface RegisterInterface
{

    public function userRegister(RegisterRequest $registerRequest, UsersTokenRequest $usersTokenRequest);
}
