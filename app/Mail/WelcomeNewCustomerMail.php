<?php

namespace App\Mail;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeNewCustomerMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * @var Customer
     */
    public $customer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): WelcomeNewCustomerMail
    {
        return $this->markdown('emails.new-welcome');
    }
}
