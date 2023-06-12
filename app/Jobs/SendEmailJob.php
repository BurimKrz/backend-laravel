<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\MarkdownMailable; 

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $validatedData;

    /**
     * Create a new job instance.
     */
    public function __construct($validatedData)
    {
        $this->validatedData = $validatedData;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $email = new MarkdownMailable($this->validatedData);
        // Mail::to($this->validatedData['email'])->send($email);
        Mail::to('teamnova3@outlook.com') ->send($email);
    }
}
 