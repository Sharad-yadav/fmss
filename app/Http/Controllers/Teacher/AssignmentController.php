<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests\Teacher\AssignmentRequest;
use App\Models\Assignment;
use App\Models\Batch;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Semester;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $title = 'Delete Assignment!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view($this->view . 'index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batches = Batch::pluck('batch_year','id');

        return view($this->view . 'create', compact('batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssignmentRequest $request)
    {
        $storeData =  $request->all();
        $user = frontUser()->load('teacher');
        $storeData['teacher_id'] = $user->teacher->id;
        if($file = $request->file('file')) {
            $storeData['file'] = Storage::putFile('files/assignments', $file);
        }
        $assignments = Assignment::create($storeData);

        return redirect()->route('teacher.assignment.index')->with('success', 'Assignment uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment)
    {
        $assignment = $assignment->load(['submissions.student.user', 'section.semester.faculty', 'subject']);
        return view($this->view.'show', compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment)
    {
        $assignment= $assignment->load('subject.semester.faculty');
        $batches = Batch::pluck('batch_year','id');

        return view($this->view.'edit', compact('assignment', 'batches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssignmentRequest $request, Assignment $assignment)
    {
        $updateData =  $request->all();
        if($file = $request->file('file')) {
            if (Storage::exists($assignment->file)) {
                Storage::delete($assignment->file);
            }
            $updateData['file'] = Storage::putFile('files/assignments', $file);
        }
        $assignment->update($updateData);

        return redirect()->route('teacher.assignment.index')->with('success', 'Notes uploaded successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        // delete file if already exists at the path.
        if (Storage::exists($assignment->file)) {
            Storage::delete($assignment->file);
        }
        $assignment->delete();

        return redirect()->route('teacher.assignment.index');
    }
    public function datatable()
    {
        $assignments= Assignment::query()->where('teacher_id', getAuthTeacher('id'))->with(['subject', 'section.semester.faculty', 'submissions','batch']);
        return DataTables::of($assignments)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'teacher.assignment.',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->addColumn('assignmentCount', function($row) {
                return '<a href="'. route('teacher.assignment.show', $row->id) .'">'. $row->submissions->count().'</a>' ;
            })
            ->editColumn('assignments', function ($row) {
                return '<a href="'. Storage::url($row->file) .'" target="_blank">'. $row->assignments .'</a>';
            })
            ->rawColumns(['assignments', 'action', 'assignmentCount'])
            ->make(true);
    }
}

