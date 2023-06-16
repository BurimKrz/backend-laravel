<?php

namespace App\Services;

use App\Models\UserLanguage;
use Illuminate\Http\Request;

class UpdateLanguageService
{

    public function setLanguage( $userId, $languageId)
    {
        $setLanguage = UserLanguage::join('users', 'users.id', 'user_language.user_id')
            ->join('language', 'language.id', 'user_language.language_id')
            ->where('users.id', $userId)
            ->pluck('language.id');

        if ($setLanguage->contains($languageId)) {
            return 'You already are using this language.';
        } else {
            UserLanguage::join('users', 'users.id', 'user_language.user_id')
                ->where('users.id', $userId)
                ->update(['user_language.language_id' => $languageId]);

            return "Updateded";
        }
    }
}
