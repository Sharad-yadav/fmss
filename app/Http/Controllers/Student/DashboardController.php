<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Notes;
use App\Models\Notice;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View|FoundationApplication
     */
    public function index() {
        $notes = Notes::whereHas('subject', function($query) {
            $query->where('semester_id', getAuthStudent('semester_id'));
        })->take(5)->get();
        $assignments = Assignment::where('section_id', getAuthStudent('section_id'))->where('batch_id', getAuthStudent('batch_id'))->take(5)->get();
        $notices = Notice::query()->take(5)->get();
        return view('backend.student.dashboard',compact('notes','assignments','notices'));
    }
}
