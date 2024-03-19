<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//ROUTE FOR USER
Route::get('/feeds', [FeedController::class, 'index'])->name('feeds')->middleware(['auth']);
Route::get('jobs/{job}/show', [JobController::class, 'show'])->name('jobs.show')->middleware(['auth']);
//TO SHOW FORM TO EDIT EXISTING JOB



Route::get('/profile/create', [ProfileController::class, 'create'])->name('user.profile.create')->middleware(['auth']);
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store')->middleware(['auth']);

Route::get('/users/{profile}/show', [ProfileController::class, 'index'])->name('users.profile.show')->middleware(['auth', 'member']);
Route::get('profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.profile.edit')->middleware(['auth', 'member']);
//TODO:ADD ROUTE TO STORE PROFILE FORM DATA
Route::post('profiles/{profile}/store', [ProfileController::class, 'update'])->name('profiles.profile.store')->middleware(['auth', 'member']);


//ROUTE FOR STORING NEW JOB
Route::get('/users/job/create', [JobController::class, 'create'])->name('users.job.create')->middleware(['auth', 'member']);
Route::post('/users/job/store', [JobController::class, 'store'])->name('users.job.store')->middleware(['auth', 'member']);
Route::get('jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit')->middleware(['auth', 'member']);
//STORING UPDATED JOB DATA
Route::post('jobs/{job}/update', [JobController::class, 'update'])->name('jobs.update')->middleware(['auth', 'member']);
//COMMENTS ROUTES
Route::post('/comments/{job}/comment/store', [CommentController::class, 'store'])->name('comments.store')->middleware(['auth', 'member']);
Auth::routes();
