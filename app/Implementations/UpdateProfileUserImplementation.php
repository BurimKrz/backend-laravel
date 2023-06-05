<?php
namespace App\Implementations;

use App\Http\Requests\UpdateProfileUserRequest;
use App\Interfaces\UpdateProfileUserInterface;
use App\Models\User;

class UpdateProfileUserImplementation implements UpdateProfileUserInterface
{

    public function updateProfileUser(UpdateProfileUserRequest $updateProfileUserRequest, $id)
    {
        $user = User::findOrFail($id);
        $user->update($updateProfileUserRequest->validated());
        if ($user) {
            return response()->json(["message" => "User updated"], 200);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}
