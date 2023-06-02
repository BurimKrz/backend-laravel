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

    protected $email;

    /**
     * Create a new job instance.
     */
    public function __construct(MarkdownMailable $email)
    {
        $this->email = $email;
        // $this->toAddress = $toAddress;
        // $this->toName = $toName;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // $mailable = new MarkdownMailable($this->email);
        // Mail::to($this->toAddress, $this->toName)->send($mailable);
        Mail::to($this->email->contactData['email'])->send($this->email);
    }
}
