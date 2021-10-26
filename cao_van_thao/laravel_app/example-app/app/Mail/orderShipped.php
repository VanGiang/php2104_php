<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\OrdersProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class orderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
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
        return $this->view('email')
                    ->with([
                        'nameOrder' => $this->order->name,
                        'phoneOrder' => $this->order->phone,
                        'addressOrder' => $this->order->address,
                        'emailOrder' => $this->order->email,
                        'toTalFinalCheckout' => $this->order->toTalFinalCheckout,
                    ]);
    }
}
