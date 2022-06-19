<?php

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

// Route Auth Admin
Route::prefix('admin')->group(function () {
    Route::middleware('checkLogin:admin')->group(function (){
        // Login
        Route::get('sign-in', [\App\Http\Controllers\Admin\AdminController::class, 'getSignIn'])->name('admin.getSignIn');
        Route::post('sign-in', [\App\Http\Controllers\Admin\AdminController::class, 'postSignIn'])->name('admin.postSignIn');
        // Registration
        Route::get('sign-up', [\App\Http\Controllers\Admin\AdminController::class, 'getSignUp'])->name('admin.getSignUp');
        Route::post('sign-up', [\App\Http\Controllers\Admin\AdminController::class, 'postSignUp'])->name('admin.postSignUp');
    });

    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');
    });
});

