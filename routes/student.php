<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [\App\Http\Controllers\Student\DashboardController::class, 'index'])->name('dashboard');
