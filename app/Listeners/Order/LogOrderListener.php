<?php

namespace App\Listeners\Order;

use App\Events\Order\PlacedOrderEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogOrderListener
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\Order\PlacedOrderEvent  $event
     * @return void
     */
    public function handle(PlacedOrderEvent $event)
    {
        logger('======= ORDER START =======');
        logger($event->customer);
        logger($event->seller);
        logger('======= ORDER END =======');
    }
}
