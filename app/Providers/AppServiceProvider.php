<?php

namespace App\Providers;

use App\Location;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		View::composer('*', function ($view) {

			$view
				->with('locations' , Location::all());
		});
    }
}
