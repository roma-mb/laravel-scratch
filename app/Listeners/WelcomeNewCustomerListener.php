<?php

namespace App\Listeners;

use App\Mail\WelcomeNewCustomerMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeNewCustomerListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(object $event): void
    {
        // check queue job, command queue:work
        // running in the background queue:work &, jobs -l
        // store queue:work > storage/logs/jobs.log &
        sleep(10);

        $customer = $event->customer;
        Mail::to($customer->email)->send(new WelcomeNewCustomerMail($customer));
    }
}
