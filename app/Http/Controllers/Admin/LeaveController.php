<?php

namespace App\Http\Controllers\Admin;

use App\Constants\LeaveConstant;
use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LeaveController extends Controller
{
    private $view = 'backend.admin.leave.';

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable();
        }
        return view($this->view .'index');
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
        $leaves= Leave::with(['user.roles'])->get();
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
                    'route' => 'teacher.leave.',
                    'url' => 'teacher/leave',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['leave_type_id', 'action'])
            ->make(true);
    }
}
