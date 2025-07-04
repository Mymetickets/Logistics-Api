<?php

namespace App\Providers;

use App\Http\Middleware\Authenticate as MiddlewareAuthenticate;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Container\Attributes\Auth;
use App\Services\Transportation\TransportationModeCategoryService;
use App\Repositories\Transportations\TransportationCategoryRepository;

use App\Services\Transportation\TransportationModelService;
use App\Repositories\Transportations\TransportationModelRepository;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(AuthService::class, function () {
            return new AuthService(new UserRepository);
        });
        $this->app->bind(Authenticate::class, MiddlewareAuthenticate::class);
        $this->app->bind(TransportationModeCategoryService::class, function () {
            return new TransportationModeCategoryService(new TransportationCategoryRepository);
        });
        // $this->app->bind(TransportationModelService::class, function () {
        //     return new TransportationModelService(
        //         new TransportationModelRepository,
        //         new TransportationCategoryRepository
        //     );
        // });
        $this->app->bind(TransportationModelService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
