<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
Route::get('teacher/import', [\App\Http\Controllers\Admin\User\TeacherController::class, 'import'])->name('teacher.import');
Route::post('teacher/import', [\App\Http\Controllers\Admin\User\TeacherController::class, 'postImport'])->name('teacher.import');
Route::get('teacher/export', [\App\Http\Controllers\Admin\User\TeacherController::class, 'export'])->name('teacher.export');
Route::resource('teacher', 'User\TeacherController');
Route::resource('student', 'User\StudentController');
Route::resource('faculty', 'User\FacultyController');
Route::resource('profile', 'ProfileController');
Route::resource('batch','BatchController');
Route::resource('semester','SemesterController');
Route::resource('section','SectionController');
Route::resource('grade','GradeController');
Route::resource('subject','SubjectController');
Route::resource('notice','NoticeController');
