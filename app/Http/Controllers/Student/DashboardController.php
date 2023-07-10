<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
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
        return view('backend.student.dashboard');
    }
}
