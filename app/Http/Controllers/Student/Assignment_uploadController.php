<?php

namespace App\Http\Controllers\Student;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\Batch;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class Assignment_uploadController extends Controller
{

    private $view = 'backend.student.assignment_upload.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable();
        }


        return view($this->view . 'index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $assignments = Assignment::pluck('assignments','id');

        return view($this->view . 'create', compact('assignments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData =  $request->all();
        $user = frontUser()->load('student');
        $storeData['student_id'] = $user->student->id;
        if ($file = $request->file('file')) {
            $storeData['file'] = Storage::putFile('files/assignment_submission/', $file);
        }
        $assignment_submissions = AssignmentSubmission::create($storeData);

        return redirect()->route('student.assignment_upload.index')->with('success', 'Assignment uploaded successfully.');
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
        $assignments_submissions = AssignmentSubmission::query()->with([ 'student.user','assignment']);
        return DataTables::of($assignments_submissions)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'student.assignment_upload.',
                    'url' => 'admin/assignment_upload',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->editColumn('file', function ($row) {
                return '<a href="' . Storage::url($row->file) . '" target="_blank">' . $row->name . '</a>';
            })
            ->rawColumns(['file', 'action'])
            ->make(true);
    }
}
