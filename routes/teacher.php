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

Route::resource('leave',\App\Http\Controllers\Teacher\LeaveController::class);
Route::resource('routine',\App\Http\Controllers\Teacher\RoutineController::class);

//LabAssistant Route
ROute::get('/dash',[\App\Http\Controllers\Teacher\LabDashController::class,'index']);


Route::get('/all-faculties', function () {
    return app(Faculty::class)->query()->select('id', 'name as text')->get();
});

Route::get('/faculty/{faculty}/semesters', function ($id) {
    return app(Semester::class)->query()->where(['faculty_id' => $id])->select('id', 'name as text')->get();
});

Route::get('semester/{semester}/sections', function ($id) {
    return app(Section::class)->query()->where(['semester_id' => $id])->select('id', 'name as text')->get();
});

Route::get('semester/{semester}/subjects', function ($id) {
    return app(Subject::class)->query()->where(['semester_id' => $id])->select('id', 'name as text')->get();
});
