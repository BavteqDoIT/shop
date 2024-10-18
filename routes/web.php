<?php

use \App\Http\Controllers\UserController;
use App\Http\Controllers\HelloWorldController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [HelloWorldController::class, 'show']);
Route::get('/users/list', [UserController::class, 'index']) -> middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
