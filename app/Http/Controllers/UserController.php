<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin_users = User::where('type', 'admin')->paginate(5);
        $customer_users = User::where('type', 'user')->paginate(5);
        // dd($admin_users);
        return view('admin.user.user_list', compact('admin_users', 'customer_users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'dob' => 'required|date',
            'address' => 'required|string',
            'nrc' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required|string',
        ]);
        $validated['password'] = bcrypt($request->password);
        $validated['type'] = 'admin';
        User::create($validated);
        return redirect()->route('user_list.index');
        // return $validated;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin_user = User::find($id);
        if (!$admin_user) {
            return redirect()->back();
        }
        return view('admin.user.user_detail', compact('admin_user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin_user = User::find($id);
        if (!$admin_user) {
            return redirect()->back();
        }
        return view('admin.user.user_edit', compact('admin_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin_user = User::find($id);
        if (!$admin_user) {
            return redirect()->back();
        }
        $validated = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'dob' => 'required|date',
            'address' => 'required|string',
            'nrc' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required|string',
        ]);
        $admin_user->update($validated);
        return redirect()->route('user_list.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
