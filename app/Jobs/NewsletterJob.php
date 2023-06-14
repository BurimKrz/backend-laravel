<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Http\Requests\SendNewsletterRequest;
use App\Mail\NewsletterMail;
use App\Models\Newsletters;
use Illuminate\Support\Facades\Mail;

class NewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */ 

     private $subject;
     private $message;

    public function __construct($subject, $message)
    {
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $emails = Newsletters::pluck('email')->toArray();
        $email = new NewsletterMail($this->subject, $this->message);
        Mail::to('teamnova3@outlook.com')
        ->bcc($emails)
        ->send($email);
    }
}
