<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function searchRoom(Request $request)
    {
        // return $request;
        $from_date = $request->start;
        $to_date = $request->end;
        $room_count = $request->room_count;
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
        $data = [];
        $room_types = RoomType::with('rooms')->get();

        // Get all Room Type
        foreach ($room_types as  $room_type) {
            $room_type_room_count = $room_type->rooms->count();
            array_push($data, [
                'room_type_id' => $room_type->room_type_id,
                'booked_room_count' => 0,
                'total_room_count' => $room_type_room_count,
            ]);
        }

        // Add Count To Room Type That are Booked
        foreach ($booked_rooms as $booked_room) {
            $room_type_id = $booked_room[0]['room']['room_type']->room_type_id;
            $room_type = RoomType::with('rooms')->where('room_type_id', $room_type_id)->first();
            $room_type_room_count = $room_type->rooms->count();
            foreach ($data as $no => $data_room) {
                if ($data_room['room_type_id'] == $room_type_id) {
                    $data[$no]['booked_room_count'] += 1;
                }
            }
        }

        // Unset Data if Room Count Dont Match
        // foreach ($data as $key => $room_data) {
        //     $available_rooms = $room_data['total_room_count'] - $room_data['booked_room_count'];
        //     if ($available_rooms < $room_count) {
        //         unset($data[$key]);
        //     }
        // }
        $room_data_array = [];
        foreach ($data as $key => $room_data) {
            // $available_rooms = $room_data['total_room_count'] - $room_data['booked_room_count'];
            // if ($available_rooms < $room_count) {
            //     unset($data[$key]);
            // }
            $room_type_data = RoomType::where('room_type_id', $room_data['room_type_id'])->first();
            array_push($room_data_array, [
                'room_type_data' => $room_type_data,
                'booked_room_count' => $room_data['booked_room_count'],
                'total_room_count' => $room_data['total_room_count'],
                'from_date' => $from_date,
                'to_date' => $to_date,
            ]);
        }
        // return $room_data_array;
        return view('user.user_room_list.user_room_list_search_view', compact(['room_data_array', 'room_types', 'from_date', 'to_date', 'room_count']));
    }
    public function searchRoomPriceView(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $room_count = $request->room_count;
        $room_type_id = $request->room_type_id;
        $price_range = $request->price_range;
        $data = [];
        $rooms = RoomType::with('rooms')
            ->when($room_type_id, function ($query) use ($room_type_id) {
                return $query->where('room_type_id', $room_type_id);
            })
            ->when($price_range, function ($query) use ($price_range) {
                return $query->where('room_type_price', '<', $price_range);
            })
            ->get();

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

        $room_data_array = [];
        foreach ($rooms as $room) {
            foreach ($room['rooms'] as $converted_room_data) {
                $room_data_array[] = $converted_room_data;
            }
        }

        foreach ($booked_rooms as $room_id => $booked_room) {
            foreach ($room_data_array as $key => $room_data) {
                if ($room_data->room_id == $room_id) {
                    unset($room_data_array[$key]);
                }
            }
        }
        $room_data = [];
        $room_data['rooms'] = array_values($room_data_array);
        $room_data['type']['from_date'] = $from_date;
        $room_data['type']['to_date'] = $to_date;
        $room_data['type']['room_count'] = $room_count;
        $room_data['type']['price_range'] = $price_range;
        return view('user.user_room_list.user_room_list_search_price_view', compact('room_data'));
    }
}
