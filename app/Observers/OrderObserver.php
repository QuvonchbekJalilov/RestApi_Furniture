<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\Notification;

class OrderObserver
{

    public function created(Order $order)
    {
        //
    }


    public function updated(Order $order)
    {
        $notification = ucfirst($order->status->code);
        $class = "\App\Notifications\Order\\".$notification;

        if (class_exists($class)) {
            Notification::send([$order->user], new $class($order));
        }
    }


    public function deleted(Order $order)
    {
        //
    }


    public function restored(Order $order)
    {
        //
    }


    public function forceDeleted(Order $order)
    {
        //
    }
}
