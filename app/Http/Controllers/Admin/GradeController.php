<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Faculty;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Semester;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GradeController extends Controller
{
    private $view = 'backend.admin.grade.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable();
        }
        $grades = Grade::latest()->paginate(10);
        $title = 'Delete Section!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view($this->view . 'index',compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semesters = Semester::all()->pluck('name', 'id');
        $faculties = Faculty::all()->pluck('name','id');
        $batches = Batch::all()->pluck('batch_year','id');
        $sections = Section::all()->pluck('name','id');


        return view($this->view . 'create', compact('semesters','faculties','batches','sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Grade::create($request->all());

        return redirect()->route('admin.grade.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        return view($this->view . 'show', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        $semesters = Semester::all()->pluck('name', 'id');
        $faculties = Faculty::all()->pluck('name','id');
        $batches = Batch::all()->pluck('batch_year','id');
        $sections = Section::all()->pluck('name','id');


        return view($this->view . 'edit', compact('semesters','faculties','batches','sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        Grade::update($request->all());

        return redirect()->route('admin.grade.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('admin.grade.index');
    }
    public function datatable()
    {
        $grades = Section::query()->with('semester', 'batch', 'faculty', 'section');
        return DataTables::of($grades)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'admin.grade.',
                    'url' => 'admin/grade',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
