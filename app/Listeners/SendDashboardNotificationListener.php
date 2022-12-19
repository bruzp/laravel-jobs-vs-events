<?php

namespace App\Listeners;

use App\Events\DashboardEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DashboardNotificationMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Testing difference of listener with and without queueing
 */

// class SendDashboardNotificationListener
class SendDashboardNotificationListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\DashboardEvent  $event
     * @return void
     */
    public function handle(DashboardEvent $event)
    {
        Mail::to($event->user->email)->send(new DashboardNotificationMail());
    }
}
