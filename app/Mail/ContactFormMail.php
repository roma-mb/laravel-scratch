<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    public $validate;

    /**
     * Create a new message instance.
     *
     * @param array $validate
     * @return void
     */
    public function __construct(array $validate)
    {
        //
        $this->validate = $validate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact.contact-form');
    }
}
