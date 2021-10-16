<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('Admin', function () {
            $conditon = false;

            // check if the user is authenticated
            if (Auth::check()) {
                // check if the user has a subscription
                $condition = (int) Auth::user()->isAdmin ;
            }

            return "<?php if ($condition == 1) { ?>";
        });

        Blade::directive('user', function () {
            return "<?php } else { ?>";
        });

        Blade::directive('endAdmin', function () {
            return "<?php } ?>";
        });

//Second directive for tourist and tourguide
        Blade::directive('tourguide', function () {
            $conditon = false;

            // check if the user is authenticated
            if (Auth::check()) {
                // check if the user is tourguide
                $condition = Auth::user()->type;
            

            return "<?php if ($condition == 1) { ?>";
            }
        });

        Blade::directive('tourist', function () {
            // check if the user is authenticated
            if (Auth::check()) {
                // check if the user is tourist
            return "<?php } else { ?>";
            }
        });
        Blade::directive('endtourguide', function () {
            return "<?php } ?>";
        });
        
    }
}
