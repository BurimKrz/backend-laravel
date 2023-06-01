<?php

namespace App\Http\Controllers;

use App\Http\Requests\Newsletter;
use App\Models\newsletters;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function addNewsletter(Newsletter $request)
    {
        $count = Newsletters::where('email', $request->email)->count();

        if ($count === 1) {
            return response()->json(['error' => 'Email already exists'], 400);
        } else {
            try {
                $newsletter = Newsletters::create([
                    'email' => $request->email,
                ]);
        
                return response()->json(['newsletter' => $newsletter], 201);
            } catch (QueryException $e) {
                return response()->json(['error' => 'Something went wrong'], 500);
            }
        }
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
