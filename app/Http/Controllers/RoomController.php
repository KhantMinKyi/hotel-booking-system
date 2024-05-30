<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with(['room_type', 'amenity'])->get();
        return view('admin.room.room_index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $amenities = Amenity::all();
        $room_types = RoomType::all();
        return view('admin.room.room_create', compact(['amenities', 'room_types']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number' => 'required|string',
            'room_size' => 'required|string',
            'amenity_id' => 'required|numeric',
            'room_type_id' => 'required|numeric',
            'location' => 'required|string',
            'accessibility' => 'required|string',
            'bed_type' => 'required|string',
            'bathroom_type' => 'required|string',
            'can_extra_bad' => 'required|numeric',
            'living_room_available' => 'required|numeric',
            'kitchen_available' => 'required|numeric',
            'corridor_available' => 'required|numeric',
            'can_smoke' => 'required|numeric',
            'is_smart_tv' => 'required|numeric',
            'room_photo' => 'required|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $image = $request->file('room_photo');
        $image_name = uniqid() . $image->getClientOriginalName();
        $image->move(public_path('/images'), $image_name);
        $validated['room_photo'] = $image_name;
        // return $validated;
        Room::create($validated);
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::with(['amenity', 'room_type'])->where('room_id', $id)->find($id);
        if (!$room) {
            return redirect()->back();
        }
        return view('admin.room.room_detail', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::with(['amenity', 'room_type'])->where('room_id', $id)->find($id);
        $amenities = Amenity::all();
        $room_types = RoomType::all();
        if (!$room) {
            return redirect()->back();
        }
        return view('admin.room.room_edit', compact(['room', 'amenities', 'room_types']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::find($id);
        if (!$room) {
            return redirect()->back();
        }
        //check image
        if ($file = $request->file('room_photo')) {
            $file_name = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('/images'), $file_name);
            File::delete(public_path('/images/' . $room->room_photo));
        } else {
            $file_name = $room->room_photo;
        }
        $validated = $request->validate([
            'room_number' => ['required', 'string', Rule::unique('rooms', 'room_number')->ignore($id, 'room_id')],
            'room_size' => 'required|string',
            'amenity_id' => 'required|numeric',
            'room_type_id' => 'required|numeric',
            'location' => 'required|string',
            'accessibility' => 'required|string',
            'bed_type' => 'required|string',
            'bathroom_type' => 'required|string',
            'can_extra_bad' => 'required|numeric',
            'living_room_available' => 'required|numeric',
            'kitchen_available' => 'required|numeric',
            'corridor_available' => 'required|numeric',
            'can_smoke' => 'required|numeric',
            'is_smart_tv' => 'required|numeric',
        ]);
        $validated['room_photo'] = $file_name;
        $room->update($validated);
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
