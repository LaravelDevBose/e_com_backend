<?php

namespace App\Events;

use App\Models\OrderItem;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OnCancelOrderItem
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $itemId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($itemId)
    {
        $this->itemId = $itemId;
    }
}
