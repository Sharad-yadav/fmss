<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Notes;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use App\Models\Notice;
use Illuminate\Contracts\Foundation\Application;


class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View|FoundationApplication
     */
    public function index() {

        $notes = Notes::query()->take(5)->get();
        $notices = Notice::query()->take(5)->get();
        $assignments = Assignment::query()->take(5)->get();
        return view('backend.teacher.dashboard', compact('assignments','notes','notices'));
    }
}
