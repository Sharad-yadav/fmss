<?php

namespace App\Http\Controllers\Admin\User;

use App\DataTables\Admin\TeachersDataTable;
use App\Exports\TeacherExport;
use App\Http\Requests\Admin\TeacherImportRequest;
use App\Imports\TeacherImport;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Teacher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Constants\RoleConstant;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;


class TeacherController extends Controller
{
    private $view = 'backend.admin.user.teacher.';
    /**
     * @var TeachersDataTable
     */
    private $teachersDataTable;

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function __construct(TeachersDataTable $teachersDataTable)
    {
        $this->teachersDataTable = $teachersDataTable;
    }

    public function index(Request $request)
    {
        return $this->teachersDataTable->render($this->view.'index');
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
    public function store(TeacherRequest $request)
    {
       // Validate teacher data
        $teacherData = $request->all();

        // Extract user data from teacher data
        $userData = $teacherData['user'];
        $userData['role_id'] = RoleConstant::TEACHER_ID;
        $userData['password'] = bcrypt('password'); // You should consider using a more secure method for generating passwords
        unset($teacherData['user']);
        DB::beginTransaction();
        $user = User::create($userData);
        $user->teacher()->create($teacherData);
        DB::commit();

        return redirect()->route('admin.teacher.index')->with('success', 'user is created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id)->load(['user', 'faculty']);

        return view($this->view . 'show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id)->load(['user', 'faculty']);
        $faculties = Faculty::all()->pluck('name', 'id');

        return view($this->view . 'edit', compact('teacher', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, string $id)
    {

        $teacher = Teacher::findOrFail($id);
        $userData = $request->input('user');
        $teacherData = $request->except(
            [
                'user',
                '_token'
            ]
        );
        DB::beginTransaction();
        $teacher->user()->update($userData);
        $teacher->update($teacherData);
        Db::commit();

        return redirect()->route('admin.teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        DB::beginTransaction();
        $teacher->user()->delete();
        $teacher->delete();
        DB::commit();

        return redirect()->route('admin.teacher.index')->with('success', 'user is deleted successfully');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function import()
    {
        return view($this->view.'import');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function postImport(TeacherImportRequest $request) {
        try {
            Excel::import(new TeacherImport, $request->file('file'));
            return redirect()->route('admin.teacher.index')->with('success', 'user is created successfully');
        }
        catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            return view($this->view.'import', compact('failures'));
        }
    }

    public function export() {
        return Excel::download(new TeacherExport, 'import-sample.xlsx');
    }
}


