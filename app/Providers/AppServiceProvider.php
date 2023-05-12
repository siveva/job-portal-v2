<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\JobListing;
use App\Models\User;
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
        //
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
        ],     
        function($view){
            $view->with('categories', Category::withCount(['jobListings'])->get());
            $view->with('totalJobs', JobListing::count());
            $view->with('totalJobSeekerAndEmployer', User::selectRaw('SUM(CASE WHEN account_type = "jobseeker" THEN 1 ELSE 0 END) as jobseeker_count, SUM(CASE WHEN account_type = "employer" THEN 1 ELSE 0 END) as employer_count')->first());
        });
    }
}
