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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $email = new MarkdownMailable($request->all());
      
        SendEmailJob::dispatch($email);

        return response()->json(['message' => 'Email sent successfully'], 200);
    }
    
}
