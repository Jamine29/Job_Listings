<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Company' => 'App\Policies\CompanyPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\CompanyUser' => 'App\Policies\CompanyUserPolicy',
        'App\Models\Job' => 'App\Policies\JobPolicy'
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
