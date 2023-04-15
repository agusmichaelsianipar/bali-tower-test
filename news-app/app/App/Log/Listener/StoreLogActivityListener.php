<?php

namespace BTNewsApp\App\Log\Listener;

use BTNewsApp\Domain\Logs\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use BTNewsApp\App\Log\Event\LogActivityEvent;

class StoreLogActivityListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \BTNewsApp\App\Log\Event\LogActivityEvent  $event
     * @return void
     */
    public function handle(LogActivityEvent $event)
    {
        Log::record(
            $event->name,
            $event->user_id,
            $event->url,
            $event->method,
            $event->ip_address,
            $event->user_agent
        );
    }
}
