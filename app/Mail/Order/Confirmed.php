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

class Confirmed extends Mailable
{
    use Queueable, SerializesModels;

    
    public function __construct(public Order $order)
    {
        
    }

    
    public function envelope()
    {
        return new Envelope(
            from: new Address('support@ecommerce.uz', "Qo'llab quvatlash"),
            subject: 'Buyurtmangiz Yaratildi',
        );
    }

   
    public function content()
    {
        return new Content(
            view: 'mail.order.confirmed',
        );
    }

    
    public function attachments()
    {
        return [];
    }
}
