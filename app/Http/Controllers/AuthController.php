<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect('/')->with('error', 'Incorrect User Name');
        }
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password is Wrong , Try Again');
        }
        auth()->login($user);
        if ($user->type == 'user') {
            return redirect('/user');
        } {
            return 'Error';
        }
    }
    public function adminLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);
        $user = User::where('username', $request->username)->first();
        if (!$user) {
            return redirect('/')->with('error', 'Incorrect User Name');
        }
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password is Wrong , Try Again');
        }
        auth()->login($user);
        if ($user->type == 'admin') {
            return redirect('/admin');
        } {
            return 'Error';
        }
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->back()->with('success', 'You Have Been Logout');
    }
}
