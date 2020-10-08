<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\CompanyRepository;
use App\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Repositories\JobRepository;
use App\Repositories\Interfaces\JobRepositoryInterface;
use App\Repositories\CompanyUserRepository;
use App\Repositories\Interfaces\CompanyUserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            CompanyRepositoryInterface::class,
            CompanyRepository::class
        );

        $this->app->bind(
            JobRepositoryInterface::class,
            JobRepository::class
        );

        $this->app->bind(
            CompanyUserRepositoryInterface::class,
            CompanyUserRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
