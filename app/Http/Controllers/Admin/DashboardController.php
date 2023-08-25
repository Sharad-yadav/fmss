<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View|FoundationApplication
     */
    public function index() {
        $faculties = Faculty::all()->count();
        $batches = Batch::all()->count();
        $students = Student::all()->count();
        $teachers = Teacher::all()->count();
        return view('backend.admin.dashboard', compact('teachers','students','faculties','batches'));
    }
}
