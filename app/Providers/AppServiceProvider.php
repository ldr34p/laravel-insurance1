<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Support\Facades\Gate;
use App\Models\Owner;
use App\Models\Car;
use App\Policies\OwnerPolicy;
use App\Policies\CarPolicy;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Owner::class, OwnerPolicy::class);
        Gate::policy(Car::class, CarPolicy::class);

        Gate::define('createCar', function ($user) {
            if ($user->type=='admin'){
                return true;
            }
            return false;
        });
        Gate::define('deleteCar', function ($user, Car $car) {
            if ($user->id==$car->owner->user_id){
                return true;
            }
            if ($user->type=='admin'){
                return true;
            }
            return false;
        });
        Gate::define('editCar', function ($user, Car $car) {
            if ($user->id==$car->owner->user_id){
                return true;
            }
            if ($user->type=='admin'){
                return true;
            }
            return false;
        });

        Gate::define('createOwner', function ($user) {
            if ($user->type=='admin'){
                return true;
            }
            return false;
        });
        Gate::define('deleteOwner', function ($user, Owner $owner) {
            if ($user->id==$owner->user_id){
                return true;
            }
            if ($user->type=='admin'){
                return true;
            }
            return false;
        });
        Gate::define('editOwner', function ($user, Owner $owner) {
            if ($user->id==$owner->user_id){
                return true;
            }
            if ($user->type=='admin'){
                return true;
            }
            return false;
        });
    }
}
