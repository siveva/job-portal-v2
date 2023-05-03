<?php

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
Route::get('/post-a-job', [JobListingController::class, 'create'])->name('post-a-job')->middleware('auth');
