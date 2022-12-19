<?php

namespace App\Providers;

use App\Events\DashboardEvent;
use App\Events\Order\PlacedOrderEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\LogDashboardAccessListener;
use App\Listeners\Order\LogOrderListener;
use App\Listeners\Order\SendOrderNotificationToCustomerListener;
use App\Listeners\Order\SendOrderNotificationToSellerListener;
use App\Listeners\SendDashboardNotificationListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        DashboardEvent::class => [
            SendDashboardNotificationListener::class,
            LogDashboardAccessListener::class,
        ],

        PlacedOrderEvent::class => [
            SendOrderNotificationToCustomerListener::class,
            SendOrderNotificationToSellerListener::class,
            LogOrderListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
