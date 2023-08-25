<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests\Teacher\NoteRequest;
use App\Models\Faculty;
use App\Models\Notes;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class NoteController extends Controller
{
    private $view = 'backend.teacher.note.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable();
        }
        $notes = Notes::latest()->paginate(10);
        $title = 'Delete Note!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view . 'index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::pluck('name', "id");

        return view($this->view . 'create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request)
    {
        $storeData =  $request->all();
        $storeData['user_id'] = frontUser('id');
        if($file = $request->file('note')) {
            $storeData['notes'] = Storage::putFile('files/notes/', $file);
        }
        $notes = Notes::create($storeData);

        return redirect()->route('teacher.note.index')->with('success', 'Notes uploaded successfully.');
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
    public function update(NoteRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note= Notes::findOrFail($id);
        DB::beginTransaction();
        $note->user()->delete();
        $note->delete();
        DB::commit();
        return redirect()->route('teacher.note.index');
    }

    public function datatable()
    {
        $notes = Notes::query()->with('subject.semester.faculty');
        return DataTables::of($notes)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'teacher.note.',
                    'url' => 'admin/note',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->editColumn('notes', function ($row) {
                return '<a href="'. Storage::url($row->notes) .'" target="_blank">'. $row->name .'</a>';
            })
            ->rawColumns(['notes', 'action'])
            ->make(true);
    }
}
