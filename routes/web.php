<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', Controllers\JobController::class);

