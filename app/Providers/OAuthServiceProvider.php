<?php

namespace App\Providers;

use App\Models\User;
use Dingo\Api\Auth\Auth;
use Dingo\Api\Auth\Provider\OAuth2;
use Illuminate\Support\ServiceProvider;
//use Illuminate\Database\Capsule\Manager as Capsule;

class OAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app[Auth::class]->extend('oauth', function ($app) {
            $provider = new OAuth2($app['oauth2-server.authorizer']->getChecker());

            $provider->setUserResolver(function ($id) {
                // Logic to return a user by their ID.
                return User::find($id);
            });

            $provider->setClientResolver(function ($id) {
                // Logic to return a client by their ID.
                /*return Capsule::table('oauth_clients')
                    ->select('*')
                    ->where('id', $id)
                    ->first();*/
            });

            return $provider;
        });
    }

    public function register()
    {
        //
    }
}
