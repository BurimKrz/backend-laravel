<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;

     /**
     * Create a new message instance.
     *
     * @param  string  $email
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this ->from('ermiraba.com', 'Ermira')
       ->subject($this->data['subject'])
       ->view(emails.index)->with('data', $this->data);
    }
}
