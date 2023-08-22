<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Role;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    private $view = 'backend.teacher.teacher.';

    /**
     * Display a listing of the resource.
     */
public function index()
{
    $roles = Role::all()->pluck('name', 'id');
    $teachers = User::all(); // Retrieve all teachers here (or use the appropriate query)

    // Pass the $teachers variable to the view
    return view('backend.teacher.teacher.show', compact('teachers', 'roles'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
public function show(string $id)
{
    $roles = Role::all()->pluck('name', 'id');
    $teacher = Teacher::find($id); // Use the Teacher model to find the teacher

    if (!$teacher) {
        // Handle the case where the teacher is not found
        abort(404);
    }

    // Pass the $teacher variable to the view
    return view('backend.teacher.teacher.show', compact('teacher', 'roles'));
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
    public function update(Request $request, Teacher $teacher)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|min:3',
        // 'role'=>'required|min:3',
        'number'=>'required|min:3',
        'password'=>'required|min:3',
        // Add more validation rules for other fields if needed
    ]);

    $teacher->update($data);

    return redirect()->route('teacher.show', $teacher->id)->with('success', 'Your information updated successfully.');
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
        $teachers = Teacher::query()->with('faculty');
        return DataTables::of($teachers)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'teacher.teacher.',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
