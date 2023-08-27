<?php

namespace App\Http\Controllers\Teacher;

use App\Constants\LeaveConstant;
use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class LeaveController extends Controller
{
    private $view = 'backend.teacher.leave.';
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
        $leaves = collect(LeaveConstant::LEAVE_TYPE)->pluck('name', 'id');

        return view($this->view.'create', compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $storeData =  $request->all();
        $user = frontUser()->load('teacher');
        $storeData['teacher_id'] = $user->teacher->id;
        if($file = $request->file('file')) {
            $storeData['file'] = Storage::putFile('files/notices/', $file);
        }
        $leaves = Leave::create($storeData);

        return redirect()->route('teacher.leave.index')->with('success', 'leave uploaded successfully.');
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
        $leaves= Leave::query()->with(['teacher.user']);
        return DataTables::of($leaves)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'teacher.leave.',
                    'url' => 'teacher/leave',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->editColumn('file', function ($row) {
                return '<a href="'. Storage::url($row->file) .'" target="_blank">'. $row->file .'</a>';
            })
            ->rawColumns(['file', 'action'])
            ->make(true);
    }
    //
}
