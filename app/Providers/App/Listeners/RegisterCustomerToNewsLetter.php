<?php

namespace App\Providers\App\Listeners;

use App\Events\NewCustomerHasRegisteredEvent;

class RegisterCustomerToNewsLetter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  NewCustomerHasRegisteredEvent  $event
     * @return void
     */
    public function handle(NewCustomerHasRegisteredEvent $event)
    {
        dump('News Letter');
    }
}
