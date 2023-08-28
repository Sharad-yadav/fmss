<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SyllabusRequest;
use App\Models\Batch;
use App\Models\Faculty;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class SyllabusController extends Controller
{
    private $view = 'backend.admin.syllabus.';
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
        $subjects = Subject::pluck('name', "id");
        $batches = Batch::pluck('batch_year','id');
        $faculties = Faculty::pluck('name','id');
        $semesters = Semester::all()->pluck('semester','id');

        return view($this->view . 'create', compact('subjects','batches','faculties','semesters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SyllabusRequest $request)
    {
        $storeData =  $request->all();
        $storeData['user_id'] = frontUser('id');
        if($file = $request->file('file')) {
            $storeData['file'] = Storage::putFile('files/syllabus/', $file);
        }
        $syllabi = Syllabus::create($storeData);

        return redirect()->route('admin.syllabus.index')->with('success', 'Notes uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $syllabus = Syllabus::findOrFail($id);


        $subjects = Subject::pluck('name', 'id');

        return view($this->view . 'edit', compact('syllabus', 'subjects'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SyllabusRequest $request, string $id)
    {

        $syllabus = Syllabus::findOrFail($id);
        if ($file = $request->file('file')) {
            Storage::delete($syllabus->file);
            $newFilePath = Storage::putFile('files/syllabus/', $file);
            $syllabus->update(['file' => $newFilePath]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $syllabus = Syllabus::findOrFail($id);

        $syllabus->delete();

        return redirect()->route('admin.syllabus.index')->with('success', 'Syllabus deleted successfully.');
    }
    public function datatable()
    {
        $syllabi = Syllabus::query()->with('subject','semester','batch','faculty');
        return DataTables::of($syllabi)
            ->addIndexColumn()
            ->addColumn('semester', function ($row) {
                return ($row->semester->faculty->name . " ". $row->semester->name) ?? null;
            })
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => false,
                    'route' => 'admin.syllabus.',
                    'url' => 'admin/syllabus',
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
