<?php

namespace App\Http\Controllers\Teacher;

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
    private $view = 'backend.teacher.teacher.';
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {

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
        $teacher = Teacher::query()->where('faculty_id', getAuthTeacher('faculty_id'))->with(['user', 'faculty']);
        return Datatables::of($teacher)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => false,
                    'is_delete' => false,
                    'is_show' => true,
                    'route' => 'teacher.teacher.',
                    'url' => 'teacher/teacher',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
