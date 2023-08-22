<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\ProfileController;

Route::get('/dashboard', [\App\Http\Controllers\Student\DashboardController::class, 'index'])->name('dashboard');
Route::resource('profile',ProfileController::class);
