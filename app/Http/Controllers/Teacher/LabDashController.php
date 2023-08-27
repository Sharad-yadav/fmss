<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabDashController extends Controller
{
    /**
     * @return Application|Factory|View|FoundationApplication
     */
    public function index()
    {


        $notices = Notice::query()->take(5)->get();

        return view('backend.teacher.lab-dashboard', compact('notices'));
    }
}
