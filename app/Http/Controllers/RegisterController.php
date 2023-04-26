<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'phone_number' => 'required|string|max:255|unique:users,phone_number',
                'country' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'agreementss' => 'required|boolean:true,false',
            ]);

        if ($validator->fails()) {
            return response() -> json(['errors' => $validator->errors()], 400);
        }
        $user = User::create([
            'name' => $request->name,
            'surname' => $request -> surname,
            'email' => $request -> email,
            'password' => bcrypt($request -> password),
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'gender' => $request->gender,
        ]);
        return response()->json(['user' => $user], 201);

    }
}