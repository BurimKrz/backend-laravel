<?php
namespace App\Services\Interfaces;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;


interface AuthInterface{

    public function createAuth(AuthRequest $authRequest);
}