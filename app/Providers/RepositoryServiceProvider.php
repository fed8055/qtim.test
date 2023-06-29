<?php

namespace App\Providers;

use App\Contracts\Repositories\NewsRepositoryContract;
use App\Contracts\Repositories\UserRepositoryContract;
use App\Repositories\NewsRepository;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends \Illuminate\Support\ServiceProvider
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
        $this->app->bind(NewsRepositoryContract::class, NewsRepository::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
    }
}
