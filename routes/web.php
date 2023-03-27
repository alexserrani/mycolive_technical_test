<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TriviaController;
use Illuminate\Support\Facades\Route;

// This is the authentication routes
// if you have more time
// craete a middleware to prevent authenticated user from "/login" and "/register"
Route::match(array('GET', 'POST'), 'login', [AuthController::class, 'login'])->name('login');
Route::match(array('GET', 'POST'), 'register', [AuthController::class, 'register'])->name('register');

// This is the TriviaController route
Route::get('/', [TriviaController::class, 'index'])->middleware('auth')->name('trivia.index');
