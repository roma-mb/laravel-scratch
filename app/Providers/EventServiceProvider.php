<?php

namespace App\Providers;

use App\Events\NewCustomerHasRegisteredEvent;
use App\Listeners\WelcomeNewCustomerListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //        Registered::class => [
        //            SendEmailVerificationNotification::class,
        //        ],
        NewCustomerHasRegisteredEvent::class => [
            WelcomeNewCustomerListener::class,
            App\Listeners\RegisterCustomerToNewsLetter::class,
            App\Listeners\NotifyAdminViaSlack::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
    }
}
