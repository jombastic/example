<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', Controllers\JobController::class);

// Auth
Route::get('/register', [Controllers\RegisteredUserController::class, 'create']);
Route::post('/register', [Controllers\RegisteredUserController::class, 'store']);

Route::get('/login', [Controllers\SessionController::class, 'create']);
Route::post('/login', [Controllers\SessionController::class, 'store']);
Route::post('/logout', [Controllers\SessionController::class, 'destroy']);
