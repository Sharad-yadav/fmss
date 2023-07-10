<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [\App\Http\Controllers\Teacher\DashboardController::class, 'index'])->name('dashboard');
