<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use App\Models\Subject;
use App\Models\Semester;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    public $view = 'backend.admin.subject.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable();
        }
        $subjects = Subject::latest()->paginate(10);
        $title = 'Delete Section!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view($this->view . 'index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semesters = Semester::all()->pluck('semester', 'id');

        return view($this->view . 'create', compact('semesters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectRequest $request)
    {
        Subject::create($request->all());

        return redirect()->route('admin.subject.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        return view($this->view . 'show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $semesters = Semester::all()->pluck('semester', 'id');

        return view($this->view . 'edit', compact('semesters', 'subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectRequest $request, Subject $subject)
    {
        $subject->update($request->all());

        return redirect()->route('admin.subject.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('admin.subject.index');
    }
    public function datatable()
    {
        $subjects = Subject::query()->with('semester.faculty');
        return DataTables::of($subjects)
            ->addIndexColumn()
            ->addColumn('semester', function ($row) {
                return ($row->semester->faculty->name . " ". $row->semester->name) ?? null;
            })
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'admin.subject.',
                    'url' => 'admin/subject',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
