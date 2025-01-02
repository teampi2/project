<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*// Defina as permissões baseadas nos papéis
        Gate::define('manage-admin', function ($user) {
            return $user->role === 'ADMINISTRATOR';
        });

        Gate::define('manage-coordinator', function ($user) {
            return in_array($user->role, ['ADMINISTRATOR', 'COORDINATOR']);
        });

        Gate::define('manage-monitor', function ($user) {
            return in_array($user->role, ['ADMINISTRATOR', 'COORDINATOR', 'MONITOR']);
        });

        Gate::define('view-student-content', function ($user) {
            return in_array($user->role, ['ADMINISTRATOR', 'COORDINATOR', 'MONITOR', 'STUDENT']);
        });*/
    }
}
