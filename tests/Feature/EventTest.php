<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use App\Events\Order\PlacedOrderEvent;
use App\Listeners\Order\LogOrderListener;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Listeners\Order\SendOrderNotificationToSellerListener;
use App\Listeners\Order\SendOrderNotificationToCustomerListener;

class EventTest extends TestCase
{
    public function test_event_page_is_displayed()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get(route('events.index'));

        $response->assertOk();
    }

    public function test_event_is_dispatched()
    {
        Event::fake();

        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post(route('events.store'))
            ->assertRedirect(route('events.index'));

        Event::assertDispatched(PlacedOrderEvent::class);
    }

    public function test_placed_order_event_listeners()
    {
        Event::fake();

        Event::assertListening(
            PlacedOrderEvent::class,
            SendOrderNotificationToCustomerListener::class
        );

        Event::assertListening(
            PlacedOrderEvent::class,
            SendOrderNotificationToSellerListener::class
        );

        Event::assertListening(
            PlacedOrderEvent::class,
            LogOrderListener::class
        );
    }
}
