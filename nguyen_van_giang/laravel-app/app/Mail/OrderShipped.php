<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $quantities;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $quantities)
    {
        $this->order = $order;
        $this->quantities = $quantities;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.order');
    }
}
