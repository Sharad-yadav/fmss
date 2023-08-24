<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class FacultyController extends Controller
{
    private $view = 'backend.admin.user.faculty.';

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable();
        }
        $title = 'Delete Faculty!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view($this->view . 'index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'years_to_graduate' => 'required'
        ]);

        Faculty::create($request->all());

        return redirect()->route('admin.faculty.index')->with('success','faculty created succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        return view($this->view . 'show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        return view($this->view . 'edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        $data = $request->validate([
            'name' => 'required',
            'years_to_graduate' => 'required',
        ]);

        $faculty->update($data);

        return redirect()->route('admin.faculty.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return redirect()->route('admin.faculty.index');
    }
    public function datatable()
    {
        $faculties = Faculty::query();

        return DataTables::of($faculties)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'admin.faculty.',
                'url' => 'admin/faculty',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
