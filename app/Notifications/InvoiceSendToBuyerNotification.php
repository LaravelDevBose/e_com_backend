<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Log;

class InvoiceSendToBuyerNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $orderInfo = Order::where('order_id', $this->order->order_id)->with('shipping')->first();
        Log::info($orderInfo);
        return (new MailMessage)
            ->from(\config('mail.from.address', 'sale@saliim.com'), config('mail.from.name', 'Sallim'))
            ->markdown('mail.v1.invoice.invoice_mail',[
                'orderInfo'=>$orderInfo,
                'url'=> route('buyer.order.show', $this->order->order_id)
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
