<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\CountryResource;
use App\Models\countries;
use App\Models\Token;
use App\Models\User;
use App\Models\usersToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        
        $user = User::create([
            'name'         => $request->name,
            'surname'      => $request->surname,
            'email'        => $request->email,
            'password'     => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'country_id'   => $request->country_id,
            'gender'       => $request->gender,

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
    public function index()
    {
        return CountryResource::collection(countries::all());
    }

}
