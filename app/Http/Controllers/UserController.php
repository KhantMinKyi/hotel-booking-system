<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function userAccountDetail()
    {
        $user = Auth::user();
        $bookings = RoomBooking::with('room')->where('user_id', $user->id)
            ->where('status', 'approved')->orderBy('from_date', 'asc')->get()->groupBy('user_room_booking_id');
        $collection = collect($bookings);

        // Step 3: Paginate the Collection
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 5; // Number of items per page
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $user_bookings = new LengthAwarePaginator($currentPageItems, $collection->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
        // return $user_bookings;
        return view('user.account.user_account', compact('user', 'user_bookings'));
    }

    public function userEdit()
    {
        $user = User::find(Auth::user()->id);
        if (!$user) {
            return redirect()->back();
        }
        return view('user.account.user_account_edit', compact('user'));
    }
    public function userChangePasswordShow()
    {
        return view('user.account.user_account_change_password');
    }
    public function userUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (!$user) {
            return redirect()->back();
        }
        $validated = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);
        // return $validated;
        $user->update($validated);
        return redirect()->route('user.user_account');
    }
    public function userPasswordUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (!$user) {
            return redirect()->back();
        }
        // return $request;
        $validated = $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            'confirm_new_password' => 'required|string',
        ]);
        if (!Hash::check($validated['old_password'], $user->password)) {
            return redirect()->back()->with('error', 'Old Password is Wrong , Try Again!');
        } else {
            if ($validated['new_password'] != $validated['confirm_new_password']) {
                return redirect()->back()->with('error', 'Password Should Be The Same , Try Again!');
            }
        }
        $validated['password'] = bcrypt($validated['new_password']);
        $user->update($validated);
        return redirect()->route('user.user_account');
    }
}
