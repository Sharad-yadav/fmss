<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        // $users=User::all();
        return view('backend.admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');

        return view('backend.admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validation
    // $task = User::create($request->all());
    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|min:3',
        // 'role'=>'required|min:3',
        'number'=>'required|min:3',
        'password'=>'required|min:3',
    ]);
    User::create($request->all());
    return redirect()->route('user.index')->with('success', 'User is  Created Successfully!');
        // return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roles = Role::all()->pluck('name', 'id');
        $user=User::find($id);
        return view('backend.admin.user.show',compact('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all()->pluck('name', 'id');
        $user=User::find($id);
        return view('backend.admin.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User::find($id);
        $user->update($request->all());
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success','user is deleted successfully');
    }
}
