<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use App\Models\Batch;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Constants\RoleConstant;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;



class StudentController extends Controller
{
    private $view = 'backend.teacher.student.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->Datatable();
        }

        return view($this->view . 'index');
        //
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
    public function store(StudentRequest $request)
    {

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id)->load(['user', 'faculty','batch','semester','section']);

        return view($this->view . 'show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faculties = Faculty::all()->pluck('name', 'id');
        $semesters = Semester::all()->pluck('name','id');
        $sections= Section::all()->pluck('name','id');

        $batches= Batch::all()->pluck('batch_year','id');
        $users= User::all()->pluck('name','id');

        return view($this->view . 'create', compact('faculties','semesters','sections','batches','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
    public function Datatable()
    {
        $student = Student::query()->where('faculty_id', getAuthTeacher('faculty_id'))->with(['user', 'faculty','batch','semester','section']);
        return Datatables::of($student)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => false,
                    'is_delete' => false,
                    'is_show' => true,
                    'route' => 'teacher.student.',
                    'url' => 'teacher/student',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}


