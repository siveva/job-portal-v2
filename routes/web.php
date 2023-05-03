<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobListingController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/want-a-job', [JobSeekerController::class, 'index'])->name('want-a-job');
// Route::get('/post-a-job', [JobListingController::class, 'create'])->name('post-a-job')->middleware('auth');

Route::get('/employer/fill-up', [EmployerController::class, 'create'])->name('employer.fill-up');
Route::post('/employer/store', [EmployerController::class, 'store'])->name('employer.store');
Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
Route::get('/job/create', [JobListingController::class, 'create'])->name('job.create');

Route::get('/jobseeker/fill-up', [JobSeekerController::class, 'create'])->name('jobseeker.fill-up');
Route::post('/jobseeker/store', [JobSeekerController::class, 'store'])->name('jobseeker.store');
Route::get('/jobseeker/dashboard', [JobSeekerController::class, 'dashboard'])->name('jobseeker.dashboard');




