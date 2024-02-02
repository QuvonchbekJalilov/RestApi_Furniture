<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    
    public function viewAny(User $user)
    {
        return $user->can('permission:viewAny');
    }

    public function view(User $user)
    {
        return $user->can('permission:view');
    }
}
