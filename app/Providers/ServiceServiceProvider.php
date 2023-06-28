<?php

namespace App\Providers;

use App\Contracts\Repositories\UserRepositoryContract;
use App\Contracts\Services\NewsServiceContract;
use App\Services\NewsService;
use App\Services\UserService;

class ServiceServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        # Internal Services
        $this->app->bind(NewsServiceContract::class, NewsService::class);
        $this->app->bind(UserRepositoryContract::class, UserService::class);
    }
}
