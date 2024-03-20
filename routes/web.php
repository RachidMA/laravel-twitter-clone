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

//AUTH MIDDLEWARE GROUP ROUTES
Route::middleware(['auth'])
    ->group(function () {
        //ROUTE FOR USER
        Route::get('/feeds', [FeedController::class, 'index'])->name('feeds');

        Route::get('jobs/{job}/show', [JobController::class, 'show'])->name('jobs.show');
        //TO SHOW FORM TO EDIT EXISTING JOB
        Route::get('/profile/create', [ProfileController::class, 'create'])->name('user.profile.create');
        Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
    });
//AUTH AND MEMBER MIDDLEWARES GROUP ROUTES
Route::middleware(['auth', 'member'])
    ->group(function () {
        Route::get('/users/{profile}/show', [ProfileController::class, 'index'])->name('users.profile.show');
        Route::get('profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.profile.edit');
        Route::post('profiles/{profile}/store', [ProfileController::class, 'update'])->name('profiles.profile.store');
        //TODO:ROUTE TO DELETE PROFILE

        //ROUTE FOR STORING NEW JOB
        Route::get('/users/job/create', [JobController::class, 'create'])->name('users.job.create');
        Route::post('/users/job/store', [JobController::class, 'store'])->name('users.job.store');
        Route::get('jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
        //STORING UPDATED JOB DATA
        Route::post('jobs/{job}/update', [JobController::class, 'update'])->name('jobs.update');
        //TODO:ROUTE TO DELETE  A JOB
        Route::delete('jobs/{job}/delete', [JobController::class, 'delete'])->name('jobs.job.delete');
        //COMMENTS ROUTES
        Route::post('/comments/{job}/comment/store', [CommentController::class, 'store'])->name('comments.store');
    });


Auth::routes();
