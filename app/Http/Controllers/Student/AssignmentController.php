<?php

namespace App\Http\Controllers\Student;

use App\Http\Requests\Student\AssignmentSubmissionRequest;
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
use Yajra\DataTables\Facades\DataTables;

class AssignmentController extends Controller
{
    private $view = 'backend.student.assignment.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable();
        }
        $title = 'Delete Note!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view . 'index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssignmentSubmissionRequest $request)
    {
        $storeData = $request->all();
        $storeData['student_id'] = getAuthStudent('id');
        if ($file = $request->file('file')) {
            $storeData['file'] = Storage::putFile('files/assignment-submission/', $file);
        }
        AssignmentSubmission::create($storeData);

        return redirect()->route('student.assignment.show', $storeData['assignment_id'])->with('success', 'Assignment uploaded successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment)
    {
        $assignment = $assignment->load(['teacher.user', 'subject']);
        return view($this->view.'show', compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $submission = AssignmentSubmission::find($id);

        return view($this->view.'edit', compact('submission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssignmentSubmissionRequest $request, string $id)
    {
        $submission = AssignmentSubmission::find($id);
        $updateData =  $request->all();
        if($file = $request->file('file')) {
            if (Storage::exists($submission->file)) {
                Storage::delete($submission->file);
            }
            $updateData['file'] = Storage::putFile('files/assignment-submission', $file);
        }
        $submission->update($updateData);

        return redirect()->route('student.assignment.show', $submission->assignment_id)->with('success', 'Notes uploaded successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assignmentSubmission = AssignmentSubmission::find($id);
        $assignmentId = $assignmentSubmission->id;
        if (Storage::exists($assignmentSubmission->file)) {
            Storage::delete($assignmentSubmission->file);
        }
        $assignmentSubmission->delete();

        return redirect()->route('student.assignment.show', $assignmentSubmission);
    }

    public function datatable()
    {
        $assignments = Assignment::query()->where('section_id', getAuthStudent('section_id'))->where('batch_id', getAuthStudent('batch_id'))->with(['subject', 'section.semester.faculty', 'teacher.user', 'batch']);
        return DataTables::of($assignments)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => false,
                    'is_delete' => false,
                    'is_show' => true,
                    'route' => 'student.assignment.',
                    'url' => 'admin/assignment',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->editColumn('assignments', function ($row) {
                return '<a href="' . Storage::url($row->file) . '" target="_blank">' . $row->assignments . '</a>';
            })
            ->rawColumns(['assignments', 'action'])
            ->make(true);
    }
}
