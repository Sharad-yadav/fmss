<?php

use App\Http\Controllers\Teacher\AssignmentController;
use App\Http\Controllers\Teacher\LabDashController;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\NoteController;
use App\Http\Controllers\Teacher\ProfileController;

Route::get('/dashboard', [\App\Http\Controllers\Teacher\DashboardController::class, 'index'])->name('dashboard');

Route::resource('profile',ProfileController::class);

Route::resource('note', NoteController::class);

Route::resource('assignment',AssignmentController::class);

Route::resource('leave',\App\Http\Controllers\Teacher\LeaveController::class);

Route::resource('notice',TeacherNoticeController::class);

Route::resource('student',StudentController::class);

//LabAssistant Route
ROute::get('/dashboard',[\App\Http\Controllers\Teacher\LabDashController::class,'index']);


Route::get('/faculty/{faculty}/semesters', function ($id) {
    return app(Semester::class)->query()->where(['faculty_id' => $id])->select('id', 'name as text')->get();
});

Route::get('semester/{semester}/subjects', function ($id) {
    return app(Subject::class)->query()->where(['semester_id' => $id])->select('id', 'name as text')->get();
});
