<?php

namespace App\Http\Controllers\Admin;

use App\Constants\NoticeConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NoticeRequest;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class NoticeController extends Controller
{
    private $view = 'backend.admin.notice.';
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
        $notices = collect(NoticeConstant::NOTICE_FOR)->pluck('name', 'id');

        return view($this->view.'create', compact('notices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoticeRequest $request)
    {
        $storeData =  $request->all();
        $storeData['user_id'] = frontUser('id');
        if($file = $request->file('file')) {
            $storeData['file'] = Storage::putFile('files/notices/', $file);
        }
        $notices = Notice::create($storeData);

        return redirect()->route('admin.notice.index')->with('success', 'Assignment uploaded successfully.');
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
        $notice = Notice::findOrFail($id);
        $notices = collect(NoticeConstant::NOTICE_FOR)->pluck('name', 'id');

        return view($this->view . 'edit', compact('notice', 'notices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $notice = Notice::findOrFail($id);

        $updateData = $request->all();
        if ($file = $request->file('file')) {
            // Delete the old file if it exists
            if ($notice->file && Storage::exists($notice->file)) {
                Storage::delete($notice->file);
            }
            $updateData['file'] = Storage::putFile('files/notices/', $file);
        }

        $notice->update($updateData);

        return redirect()->route('admin.notice.index')->with('success', 'Notice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notice = Notice::findOrFail($id);

        if ($notice->file && Storage::exists($notice->file)) {
            Storage::delete($notice->file);
        }

        $notice->delete();

        return redirect()->route('admin.notice.index')->with('success', 'Notice deleted successfully.');
    }
    public function datatable()
    {
        $notices= Notice::all();
        return DataTables::of($notices)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'admin.notice.',
                    'url' => 'admin/notice',
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
