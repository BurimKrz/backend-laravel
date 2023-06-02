<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileUserRequest;
use App\Interfaces\UpdateProfileUserInterface;

class UpdateProfileUserController extends Controller
{
    private UpdateProfileUserInterface $updateProfileUserInterface;

    public function __construct(UpdateProfileUserInterface $updateProfileUserInterface){
        $this->updateProfileUserInterface = $updateProfileUserInterface;
    }
    public function update(UpdateProfileUserRequest $updateProfileUserRequest, $id)
    {
        return response()->json($this->updateProfileUserInterface->updateProfileUser($updateProfileUserRequest, $id));
    }
}
