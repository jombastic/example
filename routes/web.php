<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('test', function() {

    return 'Done';
});

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::get('jobs', [Controllers\JobController::class, 'index']);
Route::get('jobs/create', [Controllers\JobController::class, 'create']);
Route::post('jobs', [Controllers\JobController::class, 'store'])->middleware('auth');
Route::get('jobs/{job}', [Controllers\JobController::class, 'show']);
Route::get('jobs/{job}/edit', [Controllers\JobController::class, 'edit'])
  ->middleware('auth')
  ->can('edit', 'job');
Route::patch('jobs/{job}', [Controllers\JobController::class, 'update'])
  ->middleware('auth')
  ->can('edit', 'job');
Route::delete('jobs/{job}', [Controllers\JobController::class, 'destroy'])
  ->middleware('auth')
  ->can('edit', 'job');

// Auth
Route::get('/register', [Controllers\RegisteredUserController::class, 'create']);
Route::post('/register', [Controllers\RegisteredUserController::class, 'store']);

Route::get('/login', [Controllers\SessionController::class, 'create'])->name('login');
Route::post('/login', [Controllers\SessionController::class, 'store']);
Route::post('/logout', [Controllers\SessionController::class, 'destroy']);
