<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    private $view = 'backend.admin.profile.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view($this->view . 'index');
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
    public function edit(User $profile)
    {
        return view($this->view.'edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $profile)
    {
        $updateData =  $request->all();
        if($image = $request->file('image')) {
            if (!is_null($profile->image) && Storage::exists($profile->image)) {
                Storage::delete($profile->image);
            }
            $updateData['image'] = Storage::putFile('images/profile', $image);
        }
        $profile->update($updateData);

        return redirect()->route('admin.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function changePasswordShow() {
        return view($this->view.'change-password');
    }

    public function changePassword(ChangePasswordRequest $request) {
        adminUser()->update(['password' => bcrypt($request->input('password'))]);

        return redirect()->route('admin.profile.index')->with('message', 'Password Changed Successfully.');
    }
}
