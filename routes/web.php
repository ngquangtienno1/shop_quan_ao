<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OderController;

Route::get('/', function () {
    return view('welcome');
});




Route::prefix('admin')->group(function () {
    //Dashboard route
    Route::get('/dashboard', [DashboardController::class , 'index']);

    //Category route
    Route::get('/categories', [CategoryController::class , 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class , 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class , 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class , 'edit'])->name('categories.edit');
    Route::put('/categories', [CategoryController::class , 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class , 'destroy'])->name('categories.destroy');
    Route::get('/categories/search', [CategoryController::class , 'search'])->name('categories.search');
    // Route::get('/categories/{category}', [CategoryController::class , 'show'])->name('categories.show');

    //Product route

    //Oder route

});


