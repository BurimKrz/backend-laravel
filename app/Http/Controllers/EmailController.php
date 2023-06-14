<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EmailController extends Controller
{
    public function email(Request $request, $language)
    {
        $locale = config('app.available_locales');
        App::setLocale($locale[$language]);
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
