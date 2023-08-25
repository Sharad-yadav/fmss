<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Notes;
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
        $notes = Notes::query()->take(5)->get();
        
        $assignments = Assignment::query()->take(5)->get();
        return view('backend.teacher.dashboard', compact('assignments','notes'));
    }
}
