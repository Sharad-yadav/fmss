<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Models\Faculty;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Constants\RoleConstant;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use RealRashid\SweetAlert\Facades\Alert;


class TeacherController extends Controller
{
    private $view = 'backend.admin.user.teacher.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->wantsJson()) {
            return $this->datatable();
        }
        $teachers = Teacher::latest()->paginate(10);
        $title = 'Delete Teacher!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view . 'index', compact('teachers'));
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

    public function dataTable()
    {
        $teacher = Teacher::query()->with(['user', 'faculty']);
        return Datatables::of($teacher)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'admin.teacher.',
                    'url' => 'admin/teacher',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
