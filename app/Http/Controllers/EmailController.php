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

        // $email = new MarkdownMailable($validatedData);
      
        // SendEmailJob::dispatch($email);

        dispatch(new SendEmailJob($validatedData));

        return response()->json(['message' => 'Email sent successfully'], 200);
    }
    
}
