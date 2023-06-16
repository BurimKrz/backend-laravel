<?php
namespace App\Implementations;

use App\Http\Requests\UpdateProfileUserRequest;
use App\Interfaces\UpdateProfileUserInterface;
use App\Models\User;
use App\Services\ChangeLanguageService;

class UpdateProfileUserImplementation implements UpdateProfileUserInterface
{

    public function updateProfileUser(UpdateProfileUserRequest $updateProfileUserRequest, $id, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);
        $user = User::findOrFail($id);
        $user->update($updateProfileUserRequest->validated());
        if ($user) {
            return response()->json(['message' => __('messages.userU')], 200);
        } else {
            return response()->json(['error' => __('messages.notFound')], 404);
        }
    }
}
