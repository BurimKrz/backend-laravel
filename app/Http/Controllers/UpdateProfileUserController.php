<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileUserRequest;
use App\Interfaces\UpdateProfileUserInterface;
use Illuminate\Support\Facades\App;

class UpdateProfileUserController extends Controller
{
    private UpdateProfileUserInterface $updateProfileUserInterface;

    public function __construct(UpdateProfileUserInterface $updateProfileUserInterface){
        $this->updateProfileUserInterface = $updateProfileUserInterface;
    }
    public function update(UpdateProfileUserRequest $updateProfileUserRequest, $id, $language)
    {
        $locale = config('app.available_locales');
        App::setLocale($locale[$language]);
        return response()->json($this->updateProfileUserInterface
        ->updateProfileUser($updateProfileUserRequest, $id, $language));
    }
}
