<?php

namespace App\Providers;

use App\Events\NewOrderStoreEvent;
use App\Events\OnCancelOrderItem;
use App\Events\VerifiedAccount;
use App\Listeners\InvoiceSendToBuyerEmail;
use App\Listeners\NotifyAdminForNewOrder;
use App\Listeners\ProductQtyUpdate;
use App\Listeners\UpdateProductQtyListener;
use App\Listeners\VerifyEmailListener;
use App\Listeners\VerifiedAccountListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            VerifyEmailListener::class,
        ],
        VerifiedAccount::class=>[
            VerifiedAccountListener::class,
        ],
        NewOrderStoreEvent::class=>[
            //InvoiceSendToBuyerEmail::class,
            NotifyAdminForNewOrder::class,
            ProductQtyUpdate::class,
        ],
        OnCancelOrderItem::class=>[
            UpdateProductQtyListener::class,
        ]
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
