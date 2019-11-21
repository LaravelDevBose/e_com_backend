<?php

namespace App\Listeners;

use App\Notifications\InvoiceSendToBuyerNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class InvoiceSendToBuyerEmail
{

    public function handle($event)
    {
        Notification::send($event->user, new InvoiceSendToBuyerNotification($event->order));
    }
}
