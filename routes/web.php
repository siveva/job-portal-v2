<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobSeekerController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/want-a-job', [JobSeekerController::class, 'index'])->name('want-a-job');

Route::middleware(['auth'])->group(function () {

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post-a-job', [JobController::class, 'd'])->name('post-a-job');

Route::get('/employer/fill-up', [EmployerController::class, 'create'])->name('employer.fill-up');
Route::post('/employer/store', [EmployerController::class, 'store'])->name('employer.store');
Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
Route::get('/employer/job/list', [EmployerController::class, 'jobList'])->name('employer.jobList');


Route::get('/jobseeker/fill-up', [JobSeekerController::class, 'create'])->name('jobseeker.fill-up');
Route::post('/jobseeker/store', [JobSeekerController::class, 'store'])->name('jobseeker.store');
Route::get('/jobseeker/dashboard', [JobSeekerController::class, 'dashboard'])->name('jobseeker.dashboard');

Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
Route::post('/job/store', [JobController::class, 'store'])->name('job.store');

});
