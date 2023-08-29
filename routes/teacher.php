<?php

use App\Http\Controllers\Teacher\AssignmentController;
use App\Http\Controllers\Teacher\LabDashController;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\NoteController;
use App\Http\Controllers\Teacher\ProfileController;

Route::get('/dashboard', [\App\Http\Controllers\Teacher\DashboardController::class, 'index'])->name('dashboard');

Route::resource('profile',ProfileController::class);

Route::resource('note', NoteController::class);

Route::resource('assignment',AssignmentController::class);
Route::resource('notice',NoteController::class);

Route::resource('leave',\App\Http\Controllers\Teacher\LeaveController::class);
Route::resource('routine',\App\Http\Controllers\Teacher\RoutineController::class);
Route::resource('notice',\App\Http\Controllers\Teacher\NoticeController::class);
Route::resource('syllabus',\App\Http\Controllers\Teacher\SyllabusController::class);

//LabAssistant Route
ROute::get('/dash',[\App\Http\Controllers\Teacher\LabDashController::class,'index']);

Route::get('password-change', 'ProfileController@changePasswordShow')->name('password.change');
Route::post('password-change', 'ProfileController@changePassword')->name('password.change');

