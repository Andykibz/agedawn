<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order =  $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@adawnage.com')
                ->subject('Order has been Placed Successfully')
                ->with([
                    'name'      =>  $this->order->name,
                    'invoice'   =>  $this->order->invoice,
                    'products'  =>  $this->order->products()->get(),
                ])
                ->markdown('emails.orders.placed');
    }
}
