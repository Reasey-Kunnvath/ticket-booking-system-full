<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin-guard', function (User $user) {
            return $user->role_id ===  config('roles.admin');
        });

        Gate::define('user-guard', function (User $user) {
            return $user->role_id === config('roles.user');
        });

        Gate::define('event-provider-guard', function (User $user) {
            return $user->role_id === config('roles.event-provider');
        });
    }
}