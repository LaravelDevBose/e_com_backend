<?php

namespace App\Listeners;

use App\Notifications\NewOrderNotification;

class NewOrderListeners
{

    public function handle($event)
    {
        $event->user->notify(new NewOrderNotification($event->order));
    }
}
