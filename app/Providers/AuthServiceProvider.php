<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *.php
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', fn (User $user) => $user->is_admin);
        Gate::define('users', fn (User $user) => $user->is_admin == false);
    }
}
