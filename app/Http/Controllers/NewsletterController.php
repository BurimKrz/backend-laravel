<?php

namespace App\Http\Controllers;

use App\Http\Requests\Newsletter;
use App\Models\newsletters;
use App\Notifications\WelcomeMailNotifitacion;
use App\Mail\WelcomeMail;
use App\Mail\NewsletterMail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function addNewsletter(Newsletter $request)
    {
        $newsletter = Newsletters::create([
            'email' => $request->email,
        ]);

        return response()->json(['newsletter' => $newsletter], 201);
    }

    public function sendNewsletter(Request $request)
    {

        // $newsletterEmails = Newsletters::pluck('email')->all();
        // $subject = $request->input('subject');
        // $message = $request->input('message');
    
        // foreach ($newsletterEmails as $email) {
        //     Mail::raw($message, function ($m) use ($email, $subject) {
        //         $m->to($email)->subject($subject);
        //     });
        // }
        return response()->json(['message' => 'Newsletter sent successfully'], 200);
    }
}
