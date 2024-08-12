<?php

namespace App\Http\Controllers;

use App\Models\rc;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =User::paginate(20);

        return view('users.index', ['users' => $users]);
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
        $users = new User;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password =  md5($request->password);
            $users->is_admin = $request->is_admin;
            $users->permission_id = $request->permission_id;
            $users->save();

        if ($users) {
            return redirect()->back()->with('User created successfully');
        }
        return redirect()->back()->with('User not created');
    }

    /**
     * Display the specified resource.
     */
    public function show(rc $rc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rc $rc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);

        if (!$users) {
            return back()->with('Error', 'User not found');
        }

        $users->update($request->all());

        return back()->with('Success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $users = User::find($id);

        if (!$users) {
            return back()->with('Error', 'User not found');
        }

        $users->delete();

        return back()->with('Success', 'User Deleted successfully');
    }
}
