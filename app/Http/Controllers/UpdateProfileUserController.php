<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileUserRequest;
use App\Models\User;

class UpdateProfileUserController extends Controller
{
    public function update(UpdateProfileUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());
        if ($user) {
            return response()->json("User updated", 200);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}
