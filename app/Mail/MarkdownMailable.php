<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MarkdownMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;
    /**
     * Create a new message instance.
     */
    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject:'Markdown Mailable',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown:'emails.example',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        // $toAddress = env('MAIL_USERNAME');
        // $toName = env('MAIL_TO_NAME');

        // return $this->from($toAddress, $toName)
        //     ->markdown('emails.contact')
        //     ->subject('New Contact Form Submission');

        return $this->subject('New Contact Form Submission')
        ->text('emails.example');
            
    }
}
