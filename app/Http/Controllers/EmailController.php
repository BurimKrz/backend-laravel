<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Services\ChangeLanguageService;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function email(Request $request, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);
        $validatedData = $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ]);

        // $email = new MarkdownMailable($validatedData);

        // SendEmailJob::dispatch($email);

        dispatch(new SendEmailJob($validatedData));

        return response()->json(['message' => __('messages.email')], 200);
    }

}
