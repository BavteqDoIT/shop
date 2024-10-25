<?php

use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ProductController;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/products', ProductController::class);

    Route::get('/users/list', [UserController::class, 'index']) -> middleware('auth');
    Route::delete('/users/{user}', [UserController::class, 'destroy']) -> middleware('auth');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

Auth::routes(['verify' => true]);


