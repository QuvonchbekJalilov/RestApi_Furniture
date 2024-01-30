<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    
    public function viewAny(User $user)
    {
        return $user->hasRole('customer') || $user->hasPermissionTo('order:viewAny');

    }

    
    public function view(User $user, Order $order)
    {
        return $order->user_id = $user->id || $user->hasPermissionTo('order:view');

    }

    
    public function create(User $user)
    {
        return $user->hasRole('customer') || $user->hasPermissionTo('order:create');
    }

    
    public function update(User $user, Order $order)
    {
        return $order->user_id = $user->id || $user->hasPermissionTo('order:update');
    }

   
    public function delete(User $user, Order $order)
    {
        if ($user->hasRole('customer')){
            return $order->user_id == $user->id && $order->status_id == 1;
        }else{
            return $user->hasPermissionTo('order:delete');
        }
    }

    
    public function restore(User $user, Order $order)
    {
        return $user->hasPermissionTo('order:restore');
    }

    
    public function forceDelete(User $user, Order $order)
    {
        return $user->hasPermissionTo('order:forceDelete');
    }
}
