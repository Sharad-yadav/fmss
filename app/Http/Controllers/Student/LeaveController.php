<?php

namespace App\Http\Controllers\Student;

use App\Constants\LeaveConstant;
use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class LeaveController extends Controller
{
    private $view = 'backend.student.leave.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable();
        }
        $title = 'Delete Leave!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
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
        $storeData['user_id'] = frontUser('id');
        $leaves = Leave::create($storeData);

        return redirect()->route('student.leave.index')->with('success', 'leave uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        return view($this->view . 'show', compact('leave'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        $leaves = collect(LeaveConstant::LEAVE_TYPE)->pluck('name', 'id');
        return view($this->view . 'edit', compact('leaves','leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leave $leave)
    {
        $updateData = $request->all();
        $leave->update($updateData);

        return redirect()->route('student.leave.index')->with('success', 'Leave request updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();

        return redirect()->route('student.leave.index')->with('success', 'Leave request deleted successfully.');
    }

    public function datatable()
    {
        $leaves= Leave::where('user_id', frontUser('id'))->with(['user']);
        return DataTables::of($leaves)
            ->addIndexColumn()
            ->editColumn('leave_type_id', function($row) {
                $type = collect(LeaveConstant::LEAVE_TYPE)->where('id', $row->id)->first();
                return $type['name'];
            })
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'student.leave.',
                    'url' => 'student/leave',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['leave_type_id', 'action'])
            ->make(true);
    }
    //
}
