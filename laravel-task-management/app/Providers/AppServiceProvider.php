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
        // run register methods

        // implementation of userrepository 
        $this->app->bind(

            \App\Repositories\UserRepository::class,
            \App\Repositories\DbUserRepository::class

        );
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */


    public function boot()
    {

    }
}
