<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class SyllabusController extends Controller
{
    private $view = 'backend.teacher.syllabus.';
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
        //
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
    public function update(Request $request, string $id)
    {
        //
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
        $syllabi = Syllabus::query()->where('faculty_id', getAuthTeacher('faculty_id'))->with('subject','semester','batch','faculty');
        return DataTables::of($syllabi)
            ->addIndexColumn()
            ->addColumn('semester', function ($row) {
                return ($row->semester->faculty->name . " ". $row->semester->name) ?? null;
            })
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => false,
                    'is_delete' => false,
                    'is_show' => true,
                    'route' => 'teacher.syllabus.',
                    'url' => 'teacher/syllabus',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->editColumn('file', function ($row) {
                return '<a href="'. Storage::url($row->file) .'" target="_blank">'. $row->name .'</a>';
            })
            ->rawColumns(['file', 'action'])
            ->make(true);
    }
}
