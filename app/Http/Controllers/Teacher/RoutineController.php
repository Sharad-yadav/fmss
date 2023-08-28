<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Routine;
use App\Models\Section;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class RoutineController extends Controller
{
    private $view = 'backend.teacher.routine.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable();
        }
        $title = 'Delete Assignment!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view($this->view . 'index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batches =Batch::pluck('batch_year','id');
        $semesters = Semester::pluck('name','id');
        $sections = Section::pluck('name','id');
        return view($this->view . 'create', compact('batches','semesters','sections'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData =  $request->all();
        if($file = $request->file('file')) {
            $storeData['file'] = Storage::putFile('files/routines/', $file);
        }
        $routines = Routine::create($storeData);

        return redirect()->route('teacher.routine.index')->with('success', 'Assignment uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Routine $routine)
    {
        $routine = $routine->load(['batch', 'section','semester']);
        return view($this->view.'show', compact('routine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Routine $routine)
    {
        $routine = $routine->load('semester','batch','section');
        $batches = Batch::pluck('batch_year','id');
        $semesters = Semester::pluck('name','id');
        $sections = Section::pluck('name','id');

        return view($this->view.'edit', compact('semesters', 'batches','sections','routine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Routine $routine)
    {
        $updateData =  $request->all();
        if($file = $request->file('file')) {
            if (Storage::exists($routine->file)) {
                Storage::delete($routine->file);
            }
            $updateData['file'] = Storage::putFile('files/routines', $file);
        }
        $routine->update($updateData);

        return redirect()->route('teacher.routine.index')->with('success', 'Routine uploaded successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Routine $routine)
    {
        if (Storage::exists($routine->file)) {
            Storage::delete($routine->file);
        }
        $routine->delete();

        return redirect()->route('teacher.routine.index');

    }
    public function datatable()
    {
        $routines= Routine::query()->with([ 'semester','batch','section']);
        return DataTables::of($routines)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'teacher.routine.',
                    'url' => 'teacher/routine',
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
