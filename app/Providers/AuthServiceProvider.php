<?php

namespace App\Providers;

use App\Guard\ApiAuthJwtGuard;
use App\Models\User;
use App\Providers\Auth\UserApiProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->app->bind('App\Models\User', function ($app, array $config) {
            return new User();
        });

        // add custom guard provider
        Auth::provider('users_api', function ($app, array $config) {
            return new UserApiProvider($app->make('App\Models\User'));
        });

        // add custom guard
        Auth::extend('jwt', function ($app, $name, array $config) {
            return new ApiAuthJwtGuard(Auth::createUserProvider($config['provider']), $app->make('request'));
        });
    }
}
