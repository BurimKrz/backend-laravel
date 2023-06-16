<?php

namespace App\Services;

use App\Models\UserLanguage;

class UpdateLanguageService
{
    public function setLanguage($userId, $languageId)
    {

        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);

        $setLanguage = UserLanguage::join('users', 'users.id', 'user_language.user_id')
            ->join('language', 'language.id', 'user_language.language_id')
            ->where('users.id', $userId)
            ->pluck('language.id');

        if ($setLanguage->contains($languageId)) {
            return __('messages.currentLanguage');
        } else {
            UserLanguage::join('users', 'users.id', 'user_language.user_id')
                ->where('users.id', $userId)
                ->update(['user_language.language_id' => $languageId]);

            return __('messages.updateL');
        }
    }
}
