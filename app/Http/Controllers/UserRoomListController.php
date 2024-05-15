<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomBooking;
use App\Models\RoomType;
use Illuminate\Http\Request;

class UserRoomListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room_types = RoomType::with('rooms')->get();

        return view('user.user_room_list.user_room_list_view', compact('room_types'));
    }
    public function userDashboard()
    {
        $rooms = Room::with('room_type')->limit(3)->get();

        return view('user.dashboard', compact('rooms'));
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
}
