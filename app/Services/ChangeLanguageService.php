<?php

namespace App\Services;

use Illuminate\Support\Facades\App;

class ChangeLanguageService
{

    public function changeLanguage($languageId)
    {

        $locales       = ['en', 'es', 'sq'];
        $numericValues = [];

        foreach ($locales as $index => $locale) {
            $numericValues[$locale] = $index + 1;
        }

        if (array_key_exists($languageId - 1, $locales)) {
            $selectedLocale = $locales[$languageId - 1];
            App::setLocale($selectedLocale);
        } else {
            return response()->json(['error' => 'Invalid language ID'], 400);
        }
    }
}
