<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UsersTokenRequest;
use App\Http\Resources\CountryResource;
use App\Models\countries;
use App\Services\Interfaces\RegisterInterface;

class RegisterController extends Controller
{
    public function register(RegisterRequest $registerRequest, UsersTokenRequest $usersTokenRequest, RegisterInterface $registerInterface)
    {
        return response()->json([$registerInterface->userRegister($registerRequest, $usersTokenRequest)], 201);
    }
    public function index()
    {
        return CountryResource::collection(countries::all());
    }

}
