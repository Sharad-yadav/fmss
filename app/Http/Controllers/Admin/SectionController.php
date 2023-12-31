<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SectionRequest;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Semester;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SectionController extends Controller
{
    private $view = 'backend.admin.section.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable();
        }
        $sections = Section::latest()->paginate(10);
        $title = 'Delete Section!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view($this->view . 'index',compact('sections'));

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
    public function store(SectionRequest $request)
    {


        Section::create($request->all());

        return redirect()->route('admin.section.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return view($this->view . 'show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        $semesters = Semester::all()->pluck('name', 'id');

        return view($this->view . 'edit', compact('section', 'semesters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $data = $request->validate([
            'semester_id' => 'required',
            'name' => 'required',
        ]);

        $section->update($data);

        return redirect()->route('admin.section.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()->route('admin.section.index');
    }
    public function datatable()
    {
        $sections = Section::query()->with('semester.faculty')->select('sections.*');
        return DataTables::of($sections)
            ->addIndexColumn()
            ->addColumn('semester', function ($row) {
                return ($row->semester->faculty->name . " ". $row->semester->name) ?? null;
            })
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'admin.section.',
                'url' => 'admin/section',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action', 'semestera'])
            ->make(true);
    }
}
