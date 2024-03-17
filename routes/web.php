<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
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
Route::get('/profile/create', [ProfileController::class, 'create'])->name('user.profile.create')->middleware(['auth']);
//TODO:ADD ROUTE TO STORE PROFILE FORM DATA
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store')->middleware(['auth']);
Route::get('/users/{user}/profile', [ProfileController::class, 'index'])->name('users.profile.show')->middleware(['auth']);


Auth::routes();
