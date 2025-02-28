<?php

namespace App\Providers;

use App\Repositories\Contracts\AdministratorRepositoryInterface;
use App\Repositories\Eloquent\AdministratorRepository;
use App\Repositories\Contracts\MonitorRepositoryInterface;
use App\Repositories\Eloquent\MonitorRepository;
use App\Repositories\Contracts\CoordinatorRepositoryInterface;
use App\Repositories\Eloquent\CoordinatorRepository;
use App\Repositories\Contracts\StudentRepositoryInterface;
use App\Repositories\Eloquent\StudentRepository;
use App\Repositories\Contracts\AccountRepositoryInterface;
use App\Repositories\Contracts\SchoolRepositoryInterface;
use App\Repositories\Eloquent\AccountRepository;
use App\Repositories\Contracts\VerificationCodeRepositoryInterface;
use App\Repositories\Eloquent\SchoolRepository;
use App\Repositories\Eloquent\VerificationCodeRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdministratorRepositoryInterface::class, AdministratorRepository::class);
        $this->app->bind(MonitorRepositoryInterface::class, MonitorRepository::class);
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(SchoolRepositoryInterface::class, SchoolRepository::class);
        $this->app->bind(CoordinatorRepositoryInterface::class, CoordinatorRepository::class);
        $this->app->bind(VerificationCodeRepositoryInterface::class, VerificationCodeRepository::class);
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
