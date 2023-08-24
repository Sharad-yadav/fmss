<?php

use App\Http\Controllers\Teacher\AssignmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\NoteController;
use App\Http\Controllers\Teacher\ProfileController;

Route::get('/dashboard', [\App\Http\Controllers\Teacher\DashboardController::class, 'index'])->name('dashboard');

Route::resource('profile',ProfileController::class);

Route::resource('note', NoteController::class);

Route::resource('assignment',AssignmentController::class);

