<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewOrderNotification extends Notification implements ShouldQueue
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
        return (new MailMessage)
            ->from(\config('mail.from.address', 'admin@info.com'), config('mail.from.name', 'Laravel'))
            ->markdown('emails.invoice.invoice_mail',[
                'orderInfo'=>$orderInfo,
                'url'=> url('/buyer/order/'.$orderInfo->order_no.'/invoice')
            ]);
    }

}
