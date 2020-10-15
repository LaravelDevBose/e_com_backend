<?php

namespace App\Events;

use App\Models\Order;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewOrderStoreEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    public $user;
    public $productUpdateArray;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Order $order
     * @param $productUpdateArray
     */
    public function __construct(User $user, Order $order, $productUpdateArray)
    {
        $this->user = $user;
        $this->order = $order;
        $this->productUpdateArray = $productUpdateArray;
    }
}
