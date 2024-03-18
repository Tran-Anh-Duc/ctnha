<?php

namespace App\Providers;

use App\Models\LoyalCustomer;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

//        Gate::define('access',function (LoyalCustomer $loyalCustomer){
//           return $loyalCustomer->id == 2;
//        });
    }
}
