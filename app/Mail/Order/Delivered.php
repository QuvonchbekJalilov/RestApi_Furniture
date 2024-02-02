<?php

namespace App\Mail\Order;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Delivered extends Mailable
{
    use Queueable, SerializesModels;

    
    public function __construct(public Order $order)
    {
        //
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('support@example.com', "Qo'llab quvatlash"),
            subject: 'Yetkazildi',
        );
    }

    
    public function content()
    {
        return new Content(
            view: 'mail.order.delivered',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
