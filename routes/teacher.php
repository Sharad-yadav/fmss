<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\ProfileController;

Route::get('/dashboard', [\App\Http\Controllers\Teacher\DashboardController::class, 'index'])->name('dashboard');

Route::resource('profile',ProfileController::class);
