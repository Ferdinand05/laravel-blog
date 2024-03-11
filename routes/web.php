<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UpdatePassword;
use App\Http\Controllers\UpdatePasswordController;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

// auth & admin middleware
Route::middleware('auth')->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');



    // login and has Admin Role
    Route::middleware('role:admin')->group(function () {
        // categories
        Route::resource('categories', CategoryController::class);
    });


    // posts
    Route::resource('posts', PostController::class);





    // user logged in
    Route::get('profile/{id}', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/updatepassword/{id}', [UpdatePasswordController::class, 'update'])->name('password.update');
});






// home
Route::get('/', HomeController::class)->name('home');
// blog
Route::get('blog', [BlogController::class, 'index'])->name('blog');



// auth
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');


// forgot & reset password
Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('forgot-password.store');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'index'])->name('reset-password');
Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('reset-password.store');
