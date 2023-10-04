<?php

namespace App\Providers;

use App\Repositories\Employee\EloquentEmployeeRepository;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Exam\EloquentExamRepository;
use App\Repositories\Exam\ExamRepository;
use App\Repositories\Role\EloquentRoleRepository;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\EloquentUserRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $this->app->bind(
            UserRepository::class,
            EloquentUserRepository::class
        );

        $this->app->bind(
            RoleRepository::class,
            EloquentRoleRepository::class
        );


        $this->app->bind(
            EmployeeRepository::class,
            EloquentEmployeeRepository::class
        );

        $this->app->bind(
            ExamRepository::class,
            EloquentExamRepository::class
        );
    }
}
