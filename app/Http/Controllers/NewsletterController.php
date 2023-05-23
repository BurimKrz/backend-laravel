<?php

namespace App\Http\Controllers;

use App\Http\Requests\Newsletter;
use App\Models\newsletters;
use App\Notifications\WelcomeMailNotifitacion;
use Illuminate\Support\Facades\Notification;

class NewsletterController extends Controller
{
    public function addNewsletter(Newsletter $request)
    {
        $newsletter = Newsletters::create([
            'email' => $request->email,
        ]);

        // if($newsletter){
        //     Mail::to($newsletter->email)->send(new WelcomeMail($newsletter->email));
        // }

        Notification::route('mail', $newsletter->email)
            ->notify(new WelcomeMailNotifitacion());

        return response()->json(['newsletter' => $newsletter], 201);
    }

    public function sendNewsletter(Request $request)
    {

        // $newsletterEmail = Newsletters::pluck('email')->all();

        // foreach ($newsletterEmail as $email) {
        //     Mail::to($email)->send(new NewsletterMail);
        // }
    }
}
