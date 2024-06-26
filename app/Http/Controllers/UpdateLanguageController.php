<?php

namespace App\Http\Controllers;

use App\Services\ChangeLanguageService;
use App\Services\UpdateLanguageService;
use Illuminate\Support\Facades\App;

class UpdateLanguageController extends Controller
{
    private UpdateLanguageService $updateLanguageService;

    public function __construct(UpdateLanguageService $updateLanguageService)
    {
        $this->updateLanguageService = $updateLanguageService;
    }

    public function updateLanguage($userId, $languageId)
    {
        return response()->json($this->updateLanguageService->setLanguage($userId, $languageId));
    }
}
