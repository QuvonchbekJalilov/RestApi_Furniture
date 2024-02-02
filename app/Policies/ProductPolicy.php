<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    
    public function viewAny(User $user)
    {
        return true;
    }

    
    public function view(User $user, Product $product)
    {
        return true;
    }

    
    public function create(User $user)
    {
        return auth()->user()->can('product:create');
    }

    
    public function update(User $user, Product $product)
    {
        return auth()->user()->can('product:update');
    }

    
    public function delete(User $user, Product $product)
    {
        return auth()->user()->can('product:delete');
    }

    
    public function restore(User $user, Product $product)
    {
        return auth()->user()->can('product:restore');
    }

    
    public function forceDelete(User $user, Product $product)
    {
        return true;
    }
}
