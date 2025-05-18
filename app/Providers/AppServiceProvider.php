<?php

namespace App\Providers;

use App\Models\Owner;
use App\Models\Car;
use App\Policies\OwnerPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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

        Gate::define('changeLanguage', function ($user) {
            return true;
        });

        Gate::define('deleteCar', function ($user, Owner $owner) {
            if ($user->id==$owner->user_id){
                return true;
            }
            if ($user->type=='admin'){
                return true;
            }
            return false;
        });

        Gate::define('editCar', function ($user, Owner $owner) {

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
