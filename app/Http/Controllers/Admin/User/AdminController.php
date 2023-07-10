<?php

namespace App\Http\Controllers\Admin\User;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Faculty;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    private $view = 'backend.admin.user.admin.';
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
    public function create(Request $request)
    {


        return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userData = array_merge(
            $request->input('user'),
            [
                'role_id' => RoleConstant::ADMIN_ID,
                'password' => bcrypt('password')
            ]
        );
        $adminData = $request->except(
            [
                'user',
                '_token'
            ]
        );
        DB::beginTransaction();
        $user = User::create($userData);
        $user->admin()->create($adminData);
        Db::commit();

        return redirect()->route('admin.admin.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return view($this->view . 'show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id)->load(['user']);


        return view($this->view . 'edit', compact('admin', ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = Admin::findOrFail($id);
        $userData = $request->input('user');
        $adminData = $request->except(
            [
                'user',
                '_token'
            ]
        );
        DB::beginTransaction();
        $admin->user()->update($userData);
        $admin->update($adminData);
        Db::commit();

        return redirect()->route('admin.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);
        DB::beginTransaction();
        $admin->user()->delete();
        $admin->delete();
        DB::commit();

        return redirect()->route('admin.admin.index');
    }
    public function dataTable()
    {
        $admin = Admin::query()->with(['user']);
        return Datatables::of($admin)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'admin.admin.',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
