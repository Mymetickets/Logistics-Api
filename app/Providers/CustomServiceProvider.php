<?php

namespace App\Providers;

use App\Http\Middleware\Authenticate as MiddlewareAuthenticate;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(AuthService::class, function(){
            return new AuthService(new UserRepository);
        });
        // $this->app->bind(Authenticate::class, function(){
        //     return new MiddlewareAuthenticate;
        // });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
