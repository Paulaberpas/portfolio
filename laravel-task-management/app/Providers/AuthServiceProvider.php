<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // register our policies
        // 'App\Model' => 'App\Policies\ModelPolicy',

        'App\Project' => 'App\Policies\ProjectPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    // weinject laravel class 
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        // add extra permit to admin
        // register a before hook,this triggers before any logic at the project controller
        // if false, move to the next step
        $gate->before(function($user){
            if( $user->id == 2 ){ // consider 2 as admin id for now
                 return true;
            } 
        });

    }
}
