<?php

namespace App\Notifications\Order;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Confirmed extends Notification
{
    use Queueable;

    protected Order $order;
    
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    
    public function via($notifiable)
    {
        return ['mail'];
    }
    /*
        @var $this 
    */
    public function toMail($notifiable)
    {
        return (new \App\Mail\Order\Confirmed($this->order))->to($notifiable->email);
    }

    /*
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
    */
}
