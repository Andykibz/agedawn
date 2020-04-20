<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceiveOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return  $this->from('info@adawnage.com')
        ->subject('New Order Placed')
        ->with([
            'name'      =>  $this->order->name,
            'invoice'   =>  $this->order->invoice,
            'phone'   =>  $this->order->phone,
            'email'   =>  $this->order->email,
            'location'   =>  $this->order->location,
            'products'  =>  $this->order->products()->get(),
            'date'  =>  strtotime($this->order->created_at),
        ])
        ->markdown('emails.orders.received');
    }
}
