<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    
    public function viewAny(User $user)
    {
        return $user->hasRole('customer') || $user->can('category:viewAny');
    }

    
    public function view(User $user, Category $category)
    {
        return $user->hasRole('customer') || $user->can('category:view');
    }

    
    public function create(User $user)
    {
        return auth()->user()->can('category:create');
    }

    
    public function update(User $user, Category $category)
    {
        return auth()->user()->can('category:update');
    }

    
    public function delete(User $user, Category $category)
    {
        return auth()->user()->can('category:delete');
    }

    
    public function restore(User $user, Category $category)
    {
        return auth()->user()->can('category:restore');
    }

    
    public function forceDelete(User $user, Category $category)
    {
        return $user->hasRole('admin') || $user->hasRole('shop-manager');
    }
}
