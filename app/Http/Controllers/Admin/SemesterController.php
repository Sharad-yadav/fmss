<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SemesterRequest;
use App\Models\Faculty;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Semester;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SemesterController extends Controller
{
    private $view = 'backend.admin.semester.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable();
        }
        $semesters = Semester::latest()->paginate(10);
        $title = 'Delete Faculty!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view($this->view . 'index',compact('semesters'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::all()->pluck('name', 'id');

        return view($this->view . 'create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SemesterRequest $request)
    {
        Semester::create($request->all());


        return redirect()->route('admin.semester.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        return view($this->view . 'show', compact('semester'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        $faculties = Faculty::all()->pluck('name', 'id');

        return view($this->view . 'edit', compact('semester', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SemesterRequest $request, Semester $semester)
    {
        Semester::create($request->all());

        return redirect()->route('admin.semester.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        $semester->delete();

        return redirect()->route('admin.semester.index');
    }
    public function datatable()
    {
        $semesters = Semester::query()->with('faculty');
        return DataTables::of($semesters)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'admin.semester.',
                'url' => 'admin/semester',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
