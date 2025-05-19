<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Owner;
use App\Models\Car;

class CarPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */

    public function view(User $user, Car $car): bool
    {
        if ($user->type == 'admin' || $car->owner->user_id == $user->id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */

    public function create(User $user)
    {
        if($user->type == 'admin'){
            return true;
        }
        return false;
    }

    public function update(User $user, Car $car)
    {
        if($user->type == 'admin' || $car->owner->user_id == $user->id){
            return true;
        }
        return false;
    }

    public function delete(User $user, Car $car)
    {
        if($user->type == 'admin' || $car->owner->user_id == $user->id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */

    public function restore(User $user, Car $car): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */

    public function forceDelete(User $user, Car $car): bool
    {
        return false;
    }
}
