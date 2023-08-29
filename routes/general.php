<?php

use App\Models\Faculty;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;

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
