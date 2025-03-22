<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OderController;
use App\Http\Middleware\CheckLoginAdmin;

Route::get('/', function () {
    return view('welcome');
});




Route::prefix('admin')->group(function () {
    //Login

        Route::get('/login', [AuthController::class , 'index'])->name('auth.index')->middleware('auth.login-admin');
        Route::post('/login', [AuthController::class , 'login'])->name('auth.login');
        Route::get('/logout', [AuthController::class , 'logout'])->name('auth.logout');








    //Dashboard route
    Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard')->middleware('auth.login');

    //Category route
    Route::get('/categories', [CategoryController::class , 'index'])->name('categories.index')->middleware('auth.login');
    Route::get('/categories/create', [CategoryController::class , 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class , 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class , 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class , 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class , 'destroy'])->name('categories.destroy');
    Route::get('/categories/search', [CategoryController::class , 'search'])->name('categories.search');
    // Route::get('/categories/{category}', [CategoryController::class , 'show'])->name('categories.show');

    //Product route

    //Oder route

});


