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
    public function roomTypeDetail(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $room_type_id = $request->room_type_id;

        $data = [];
        $rooms = RoomType::with('rooms')->where('room_type_id', $room_type_id)->first();

        $booked_rooms = RoomBooking::with('room')
            ->where(function ($query) use ($from_date, $to_date) {
                $query->whereBetween('from_date', [$from_date, $to_date])
                    ->orWhere(function ($query) use ($from_date, $to_date) {
                        $query->where('from_date', '=', $from_date)
                            ->where('to_date', '!=', $to_date);
                    });
            })
            ->where('from_date', '!=', $to_date)
            ->get()->groupBy('room_id');

        // Get all Room Type

        // array_push($rooms['rooms'], [
        //     'from_date' => $from_date,
        //     'to_date' => $to_date,
        // ]);
        $rooms['rooms'][0]['from_date'] = $from_date;
        $rooms['rooms'][0]['to_date'] = $to_date;
        foreach ($booked_rooms as $room_id => $booked_room) {
            foreach ($rooms['rooms'] as $key => $room) {
                if ($room->room_id == $room_id) {
                    unset($rooms['rooms'][$key]);
                }
            }
        }
        // return $rooms;
        return view('user.user_room_list.user_room_list_room_type_detail', compact('rooms'));
    }
}
