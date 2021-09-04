<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Delivery;

class DeliveryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $delivery;

    public function __construct(Delivery $delivery)
    {
        $this->delivery= $delivery;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('delivery_notification');
    }
}
