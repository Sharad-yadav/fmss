<?php

namespace App\Http\Controllers\Admin\User;

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
    private $view = 'backend.admin.user.student.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->Datatable();
        }
        $students = Student::latest()->paginate(10);
        $title = 'Delete Student!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view($this->view . 'index',compact('students'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::all()->pluck('name', 'id');
        $semesters = Semester::all()->pluck('name','id');
        $sections= Section::all()->pluck('name','id');

        $batches= Batch::all()->pluck('batch_year','id');
        $users= User::all()->pluck('name','id');

        return view($this->view . 'create', compact('faculties','semesters','sections','batches','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(StudentRequest $request)
    {
    $studentData = $request->all();

    $userData = $studentData['user'];
    $userData['role_id'] = RoleConstant::STUDENT_ID;
    $userData['password'] = bcrypt('password'); // You should consider using a more secure method for generating passwords
    unset($studentData['user']);
    DB::beginTransaction();
    $user = User::create($userData);
    $user->student()->create($studentData);
    DB::commit();

    return redirect()->route('admin.student.index')->with('success', 'user is created successfully');
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
    public function edit(Student $student)
    {
        $faculties = Faculty::all()->pluck('name', 'id');
        $semesters = Semester::all()->pluck('name','id');
        $sections= Section::all()->pluck('name','id');

        $batches= Batch::all()->pluck('batch_year','id');
        $users= User::all()->pluck('name','id');

        return view($this->view . 'edit', compact('faculties','semesters','sections','batches','users','student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        $student = Student::findOrFail($id);
        $userData = $request->input('user');
        $studentData = $request->except(
            [
                'user',
                '_token'
            ]
        );
        DB::beginTransaction();
        $student->user()->update($userData);
        $student->update($studentData);
        Db::commit();

        return redirect()->route('admin.student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        DB::beginTransaction();
        $student->user()->delete();
        $student->delete();
        DB::commit();

        return redirect()->route('admin.student.index');
    }
    public function Datatable()
    {
        $student = Student::query()->with(['user', 'faculty','batch','semester','section']);
        return Datatables::of($student)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'admin.student.',
                'url' => 'admin/student',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
