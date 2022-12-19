<?php

namespace App\Listeners\Order;

use Illuminate\Support\Facades\Mail;
use App\Events\Order\PlacedOrderEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\Order\OrderNotificationToSellerMail;

class SendOrderNotificationToSellerListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\Order\PlacedOrderEvent  $event
     * @return void
     */
    public function handle(PlacedOrderEvent $event)
    {
        Mail::to($event->seller['email'])->send(new OrderNotificationToSellerMail());
    }
}
