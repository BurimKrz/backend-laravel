<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\MarkdownMailable;

class EmailController extends Controller
{
    public function email(Request $request)
    {
       $validatedData =  $request->validate([
            'name' => 'required',
            'email' => 'required|email', 
            'message' => 'required',
        ]);

        // $sendData = [
        //     'recipient' => 'teamnova3@gmail.com',
        //     'fromEmail' => $request->email,
        //     'fromName' => $request->name,
        //     'message' => $request->message,
        // ];

        // $toAddress = env('MAIL_USERNAME');
        // $toName = env('MAIL_TO_NAME');

        $email = new MarkdownMailable($validatedData);
      
        SendEmailJob::dispatch($email);

        // Mail::send($sendData, function ($message) use ($sendData) {
        //     $message->to($sendData['recipient'])
        //         ->from($sendData['fromEmail'], $sendData['fromName']);
        // });

        return response()->json(['message' => 'Email sent successfully'], 200);
    }
    
}
