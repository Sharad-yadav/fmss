<?php

namespace App\Http\Controllers\Admin\User;

use App\DataTables\Admin\StudentsDataTable;
use App\Exports\StudentExport;
use App\Http\Requests\Admin\StudentImportRequest;
use App\Imports\StudentImport;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Batch;
use App\Models\Semester;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Constants\RoleConstant;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    private $view = 'backend.admin.user.student.';
    /**
     * @var StudentsDataTable
     */
    private $studentsDataTable;

    public function __construct(StudentsDataTable $studentsDataTable)
    {
        $this->studentsDataTable = $studentsDataTable;
    }

    public function index(Request $request)
    {
        return $this->studentsDataTable->render($this->view.'index');
    }

    public function create()
    {
        $faculties = Faculty::all()->pluck('name', 'id');
        $semesters = Semester::all()->pluck('semester', 'id');
        $sections = Section::all()->pluck('name', 'id');
        $batches = Batch::all()->pluck('batch_year', 'id');
        $users = User::all()->pluck('name', 'id');

        return view($this->view . 'create', compact('faculties', 'semesters', 'sections', 'batches', 'users'));
    }

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

        return redirect()->route('admin.student.index')->with('success', 'Student created successfully');
    }

    public function show(string $id)
    {
        $student = Student::findOrFail($id)->load(['user', 'faculty', 'batch', 'semester', 'section']);

        return view($this->view . 'show', compact('student'));
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id)->load(['user', 'faculty', 'batch', 'semester', 'section']);
        $faculties = Faculty::all()->pluck('name', 'id');
        $semesters = Semester::all()->pluck('name', 'id');
        $sections = Section::all()->pluck('name', 'id');
        $batches = Batch::all()->pluck('batch_year', 'id');
        $users = User::all()->pluck('name', 'id');

        return view($this->view . 'edit', compact('student', 'faculties', 'semesters', 'sections', 'batches', 'users'));
    }

    public function update(StudentRequest $request, string $id)
    {
        $student = Student::findOrFail($id);
        $userData = $request->input('user');
        $studentData = $request->except([
            'user',
            '_token',
        ]);
        DB::beginTransaction();
        $student->user()->update($userData);
        $student->update($studentData);
        DB::commit();

        return redirect()->route('admin.student.index')->with('success', 'Student updated successfully');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        DB::beginTransaction();
        $student->user()->delete();
        $student->delete();
        DB::commit();

        return redirect()->route('admin.student.index')->with('success', 'Student deleted successfully');
    }
    public function import()
    {
        return view($this->view.'import');
    }

    public function postImport(StudentImportRequest $request) {
        try {
            Excel::import(new StudentImport(), $request->file('file'));
            return redirect()->route('admin.student.index')->with('success', 'user is created successfully');
        }
        catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            return view($this->view.'import', compact('failures'));
        }
    }

    public function export() {
        return Excel::download(new StudentExport, 'import-sample.xlsx');
    }
}
