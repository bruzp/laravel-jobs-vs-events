<?php

namespace App\Listeners;

use App\Events\DashboardEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogDashboardAccessListener
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\DashboardEvent  $event
     * @return void
     */
    public function handle(DashboardEvent $event)
    {
        info($event->message);
        logger($event->user);
    }
}
