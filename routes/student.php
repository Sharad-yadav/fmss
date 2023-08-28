<?php

use App\Http\Controllers\Student\AssignmentController;
use App\Http\Controllers\Student\NoteController;
use App\Http\Controllers\Student\NoticeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\Assignment_uploadController;

Route::get('/dashboard', [\App\Http\Controllers\Student\DashboardController::class, 'index'])->name('dashboard');
Route::resource('profile',ProfileController::class);
Route::resource('leave',\App\Http\Controllers\Student\LeaveController::class);

Route::resource('note',NoteController::class);

Route::resource('assignment',AssignmentController::class);

Route::resource('notice',NoticeController::class);

Route::resource('assignment_upload',Assignment_uploadController::class);
Route::get('password-change', 'ProfileController@changePasswordShow')->name('password.change');
Route::post('password-change', 'ProfileController@changePassword')->name('password.change');
