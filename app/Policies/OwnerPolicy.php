<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Owner;

class OwnerPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Owner $owner)
    {
        return true;
    }

    public function create(User $user)
    {
        if($user->type == 'admin'){
        return true;
        }
        return false;
    }

    public function update(User $user, Owner $owner)
    {
        if($user->type == 'admin' || $owner->user_id == $user->id){
            return true;
        }
        return false;
    }

    public function delete(User $user, Owner $owner)
    {
        if($user->type == 'admin' || $owner->user_id == $user->id){
            return true;
        }
        return false;
    }
}
