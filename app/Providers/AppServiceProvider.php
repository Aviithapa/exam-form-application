<?php

namespace App\Providers;

use App\Repositories\Applicant\ApplicantRepository;
use App\Repositories\Applicant\EloquentApplicantRepository;
use App\Repositories\ApplicantDocuments\ApplicantDocumentRepository;
use App\Repositories\ApplicantDocuments\EloquentApplicantDocumentRepository;
use App\Repositories\ApplicantLog\ApplicantLogRepository;
use App\Repositories\ApplicantLog\EloquentApplicantLogRepository;
use App\Repositories\Employee\EloquentEmployeeRepository;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Exam\EloquentExamRepository;
use App\Repositories\Exam\ExamRepository;
use App\Repositories\FamilyInformation\EloquentFamilyInformationRepository;
use App\Repositories\FamilyInformation\FamilyInformationRepository;
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

        $this->app->bind(
            ApplicantRepository::class,
            EloquentApplicantRepository::class
        );

        $this->app->bind(
            ApplicantDocumentRepository::class,
            EloquentApplicantDocumentRepository::class
        );

        $this->app->bind(
            FamilyInformationRepository::class,
            EloquentFamilyInformationRepository::class
        );

        $this->app->bind(
            ApplicantLogRepository::class,
            EloquentApplicantLogRepository::class
        );
    }
}
