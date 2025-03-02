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
use App\Repositories\Contracts\ActivityRepositoryInterface;
use App\Repositories\Contracts\ClassesRepositoryInterface;
use App\Repositories\Contracts\ClassStudentRepositoryInterface;
use App\Repositories\Contracts\ClassTeacherRepositoryInterface;
use App\Repositories\Contracts\LessonPlanRepositoryInterface;
use App\Repositories\Contracts\LessonRepositoryInterface;
use App\Repositories\Contracts\SchoolRepositoryInterface;
use App\Repositories\Contracts\StudentActivityRepositoryInterface;
use App\Repositories\Eloquent\AccountRepository;
use App\Repositories\Contracts\VerificationCodeRepositoryInterface;
use App\Repositories\Eloquent\ActivityRepository;
use App\Repositories\Eloquent\ClassesRepository;
use App\Repositories\Eloquent\ClassStudentRepository;
use App\Repositories\Eloquent\ClassTeacherRepository;
use App\Repositories\Eloquent\LessonPlanRepository;
use App\Repositories\Eloquent\LessonRepository;
use App\Repositories\Eloquent\SchoolRepository;
use App\Repositories\Eloquent\StudentActivityRepository;
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
        $this->app->bind(ClassesRepositoryInterface::class, ClassesRepository::class);
        $this->app->bind(ClassStudentRepositoryInterface::class, ClassStudentRepository::class);
        $this->app->bind(ClassTeacherRepositoryInterface::class, ClassTeacherRepository::class);
        $this->app->bind(CoordinatorRepositoryInterface::class, CoordinatorRepository::class);
        $this->app->bind(VerificationCodeRepositoryInterface::class, VerificationCodeRepository::class);
        $this->app->bind(ActivityRepositoryInterface::class, ActivityRepository::class);
        $this->app->bind(StudentActivityRepositoryInterface::class, StudentActivityRepository::class);
        $this->app->bind(LessonPlanRepositoryInterface::class, LessonPlanRepository::class);
        $this->app->bind(LessonRepositoryInterface::class, LessonRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
}
