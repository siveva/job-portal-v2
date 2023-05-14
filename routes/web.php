<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Models\JobListing;
use App\Models\JobSeeker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [WebsiteController::class, 'landingPage'])->name('site.landing.page');
Route::get('/search-jobs', [WebsiteController::class, 'searchJobs'])->name('site.search.jobs');

Auth::routes();


Route::get('/want-a-job', [JobSeekerController::class, 'index'])->name('want-a-job');

// Route::get('/post-a-job', [JobController::class, 'd'])->name('post-a-job');

Route::get('/job-single', [JobController::class, 'show'])->name('job-single');



Route::middleware(['auth'])->group(function () {

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



});


// middleware for employer
Route::middleware(['auth', 'employer'])->group(function () {
    // Routes for employer
    Route::get('/employer/fill-up', [EmployerController::class, 'create'])->name('employer.fill-up');
    Route::post('/employer/store', [EmployerController::class, 'store'])->name('employer.store');
    Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
    Route::get('/employer/job/list', [EmployerController::class, 'jobList'])->name('employer.jobList');
    Route::get('/employer/overview/edit', [EmployerController::class, 'edit'])->name('employer.overview.edit');
    Route::put('/employer/overview/update', [EmployerController::class, 'update'])->name('employer.overview.update');



    Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
    Route::post('/job/store', [JobController::class, 'store'])->name('job.store');
    Route::delete('/jobs/{jobListing}', [JobController::class,'destroy'])->name('job.destroy');
    Route::get('/job/{job}/edit', [JobController::class, 'edit'])->name('job.edit');
    Route::put('/job/update/{job}', [JobController::class, 'update'])->name('job.update');

    Route::put('/user/employer/update/{id}', [UserController::class, 'updateProfile'])->name('user.employer.update');
    Route::put('/user/employer/pass/update/{id}', [UserController::class, 'changePassword'])->name('user.employer.changePassword');

    

});

// middleware for jobseeker
Route::middleware(['auth', 'jobseeker'])->group(function () {
    // Routes for jobseeker
    Route::get('/jobseeker/fill-up', [JobSeekerController::class, 'create'])->name('jobseeker.fill-up');
    Route::post('/jobseeker/store', [JobSeekerController::class, 'store'])->name('jobseeker.store');
    Route::get('/jobseeker/dashboard', [JobSeekerController::class, 'dashboard'])->name('jobseeker.dashboard');

    Route::get('/jobseeker/overview/edit', [JobSeekerController::class, 'edit'])->name('jobseeker.overview.edit');
    Route::put('/jobseeker/overview/update', [JobSeekerController::class, 'update'])->name('jobseeker.overview.update');

    Route::put('/user/jobseeker/update/{id}', [UserController::class, 'updateProfile'])->name('user.jobseeker.update');
    Route::put('/user/jobseeker/pass/update/{id}', [UserController::class, 'changePassword'])->name('user.jobseeker.changePassword');

});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::put('/user/admin/update/{id}', [AdminController::class, 'updateProfile'])->name('user.admin.update');
    Route::put('/user/admin/pass/update/{id}', [AdminController::class, 'changePassword'])->name('user.admin.changePassword');


});
