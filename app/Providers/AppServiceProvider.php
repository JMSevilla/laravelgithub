<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
       $this->loadHelpers(); // adaugi linia asta, si functia de mai jos
    }
  
    /**
     * Load helpers.
     */
    protected function loadHelpers()
    {
        foreach (glob(app_path('Helpers/*.php')) as $filename) {
            require_once $filename;
        }
    }
}
