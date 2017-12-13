<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    //Se a;aden los eventos y los listeners
    protected $listen = [
        'App\Events\MessageWasReceived' => [
            'App\Listeners\SendAutoResponder',
            'App\Listeners\SendNotificationToTheOwner'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
