<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\JobListing;
use App\Models\User;
use App\Services\JobApplicationService;
use App\Interfaces\JobApplicationServiceInterface;
use App\Interfaces\SmsServiceInterface;
use App\Services\SmsService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(JobApplicationServiceInterface::class, JobApplicationService::class);
        $this->app->bind(SmsServiceInterface::class, SmsService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        view()->composer([
            'landing-layouts.master',
            'search-result',
            'welcome',
            'jobs.job-single-2',
            'jobs.job-apply',
        ],     
        function($view){
            $view->with('categories', Category::withCount(['jobListings'])->get());
            $view->with('totalJobs', JobListing::count());
            $view->with('totalJobSeekerAndEmployer', User::selectRaw('SUM(CASE WHEN account_type = "jobseeker" THEN 1 ELSE 0 END) as jobseeker_count, SUM(CASE WHEN account_type = "employer" THEN 1 ELSE 0 END) as employer_count')->first());
        });
    }
}
