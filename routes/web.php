<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OrderController;
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
    Route::post('/categories/bulk-delete', [CategoryController::class, 'bulkDelete'])->name('categories.bulkDelete');
    Route::get('/categories/{id}', [CategoryController::class , 'show'])->name('categories.show');

    //Product route
 

    //Oder route
    Route::get('/orders', [OrderController::class , 'index'])->name('orders.index')->middleware('auth.login');
    // Route::get('/orders/create', [OrderController::class , 'create'])->name('orders.create');
    // Route::post('/orders', [OrderController::class , 'store'])->name('orders.store');
    Route::get('/orders/edit/{id}', [OrderController::class , 'edit'])->name('orders.edit');
    Route::put('/orders/{id}', [OrderController::class , 'update'])->name('orders.update');
    Route::delete('/orders/{id}', [OrderController::class , 'destroy'])->name('orders.destroy');
    Route::get('/orders/search', [OrderController::class , 'search'])->name('orders.search');
    Route::post('/orders/bulk-delete', [OrderController::class, 'bulkDelete'])->name('orders.bulkDelete');
    Route::get('/orders/{id}', [OrderController::class , 'show'])->name('orders.show');

});


