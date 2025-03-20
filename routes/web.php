<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});




Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class , 'index']);
});


