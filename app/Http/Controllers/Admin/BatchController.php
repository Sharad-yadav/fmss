<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batch;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BatchController extends Controller
{
    private $view = 'backend.admin.batch.';

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
        return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'batch_year' => 'required',

        ]);

        Batch::create($data);

        return redirect()->route('admin.batch.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Batch $batch)
    {
        return view($this->view . 'show', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Batch $batch)
    {
        return view($this->view . 'edit', compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Batch $batch)
    {
        $data = $request->validate([
            'batch_year' => 'required',

        ]);

        $batch->update($data);

        return redirect()->route('admin.batch.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();

        return redirect()->route('admin.batch.index');
    }
    public function datatable()
    {
        $batches = Batch::query();

        return DataTables::of($batches)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'admin.batch.',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
