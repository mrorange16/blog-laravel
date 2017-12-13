<?php

namespace App\Providers;
use App\User;//para usar User::class
use App\Policies\UserPolicy;//UserPolicy::class

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    //Se deben adjuntar 
    protected $policies = [
        //'App\User' => 'App\Policies\UserPolicy',
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    
    {
        $this->registerPolicies();

        //
    }



}
