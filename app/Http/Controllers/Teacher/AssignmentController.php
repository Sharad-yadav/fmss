<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Assignment;
use App\Models\Batch;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Semester;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class AssignmentController extends Controller
{

    private $view = 'backend.teacher.assignment.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable();
        }
        $assignments = Assignment::latest()->paginate(10);
        $title = 'Delete Note!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view . 'index',compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::pluck("name", "id");
        $faculties = Faculty::pluck('name', "id");
        $semesters = Semester::pluck('name', 'id');
        $batches = Batch::pluck('batch_year','id');
        $sections = Section::pluck('name','id');

        return view($this->view . 'create', compact('semesters', 'faculties', 'subjects','batches','sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData =  $request->all();
        $user = frontUser()->load('teacher');
        $storeData['teacher_id'] = $user->teacher->id;
        if($file = $request->file('file')) {
            $storeData['file'] = Storage::putFile('files/assignments/', $file);
        }
        $assignments = Assignment::create($storeData);

        return redirect()->route('teacher.assignment.index')->with('success', 'Assignment uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function datatable()
    {
        $assignments= Assignment::query()->with(['subject', 'section.semester.faculty', 'teacher.user','batch']);
        return DataTables::of($assignments)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'teacher.assignment.',
                    'url' => 'admin/assignment',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->editColumn('assignments', function ($row) {
                return '<a href="'. Storage::url($row->file) .'" target="_blank">'. $row->assignments .'</a>';
            })
            ->rawColumns(['assignments', 'action'])
            ->make(true);
    }
}

