<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
Route::resource('teacher', 'User\TeacherController');
Route::resource('student', 'User\StudentController');
Route::resource('faculty', 'User\FacultyController');
Route::resource('admin', 'User\AdminController');
Route::resource('batch','BatchController');
Route::resource('semester','SemesterController');
Route::resource('section','SectionController');
