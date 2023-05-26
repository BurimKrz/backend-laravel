<?php
namespace App\Services\Services;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UsersTokenRequest;
use App\Models\token;
use App\Models\User;
use App\Models\usersToken;
use App\Services\Interfaces\RegisterInterface;

class RegisterService implements RegisterInterface
{

    public function userRegister(RegisterRequest $registerRequest, UsersTokenRequest $usersTokenRequest)
    {
        $user =  User::create([
            'name'         => $registerRequest->name,
            'surname'      => $registerRequest->surname,
            'email'        => $registerRequest->email,
            'password'     => bcrypt($registerRequest->password),
            'phone_number' => $registerRequest->phone_number,
            'country_id'   => $registerRequest->country_id,
            'gender'       => $registerRequest->gender,

        ]);

        if ($user) {
            $token = Token::create([
                'amount' => 100,
            ]);
            UsersToken::create([
                'user_id'  => $user->id,
                'token_id' => $token->id,
            ]);
        }

        return response()->json(['user' => $user], 201);
    }

}
