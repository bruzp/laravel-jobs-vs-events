<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Events\Order\PlacedOrderEvent;

class EventsController extends Controller
{
    public function index()
    {
        return Inertia::render('Events');
    }

    public function store(Request $request)
    {
        #some business logic

        PlacedOrderEvent::dispatch(
            ['email' => 'your.no.1.customer@gmail.com'],
            ['email' => 'your.seller.from.another.world@gmail.com']
        );

        return redirect()
            ->route('events.index')
            ->with('message', 'Your order is now being processed. | Sent mail to customer. | Sent mail to seller. | Logged order');
    }
}
