<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Notifications\newUserNotification;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Log;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

//AUTH MIDDLEWARE GROUP ROUTES
Route::middleware(['auth'])
    ->group(function () {
        //ROUTE FOR USER
        Route::get('/feeds', [FeedController::class, 'index'])->name('feeds');

        Route::get('jobs/{job}/show', [PostController::class, 'show'])->name('jobs.show');
        //TO SHOW FORM TO EDIT EXISTING JOB
        Route::get('/profile/create', [ProfileController::class, 'create'])->name('user.profile.create');
        Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
    });
//AUTH AND MEMBER MIDDLEWARES GROUP ROUTES
Route::middleware(['auth', 'member'])
    ->group(function () {
        Route::get('/users/{profile}/show', [ProfileController::class, 'index'])->name('users.profile.show')->middleware('can:view,profile');

        Route::get('profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.profile.edit')->middleware('can:edit-profile, profile');
        Route::post('profiles/{profile}/store', [ProfileController::class, 'update'])->name('profiles.profile.store')->middleware('can:edit-profile,profile');

        //ROUTE FOR STORING NEW JOB
        Route::get('/users/job/create', [PostController::class, 'create'])->name('users.job.create');
        Route::post('/users/job/store', [PostController::class, 'store'])->name('users.job.store');
        Route::get('jobs/{job}/edit', [PostController::class, 'edit'])->name('jobs.edit')->middleware('can:update-job,job');
        //STORING UPDATED JOB DATA
        Route::post('jobs/{job}/update', [PostController::class, 'update'])->name('jobs.update')->middleware('can:update-job,job');
        //TODO:ROUTE TO DELETE  A JOB
        Route::delete('jobs/{job}/delete', [PostController::class, 'delete'])->name('jobs.job.delete')->middleware('can:job-delete,job');
        //COMMENTS ROUTES
        Route::post('/comments/{job}/comment/store', [CommentController::class, 'store'])->name('comments.store');
    });


Auth::routes();
