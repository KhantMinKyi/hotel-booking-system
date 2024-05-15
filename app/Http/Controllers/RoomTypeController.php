<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room_types = RoomType::all();

        return view('admin.room_type.room_type_index', compact('room_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room_type.room_type_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_type' => 'required|string',
            'room_type_price' => 'required|numeric',
            'room_type_score' => 'required|numeric',
        ]);
        RoomType::create($validated);
        return redirect()->route('room_type.index');
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
        $room_type = RoomType::find($id);
        if (!$room_type) {
            return redirect()->back();
        }
        return view('admin.room_type.room_type_edit', compact('room_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room_type = RoomType::find($id);
        if (!$room_type) {
            return redirect()->back();
        }
        $validated = $request->validate([
            'room_type' => 'required|string',
            'room_type_price' => 'required|numeric',
            'room_type_score' => 'required|numeric',
        ]);
        $room_type->update($validated);
        return redirect()->route('room_type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function dashboradIndex()
    {
        $room_types = RoomType::with('rooms')->limit(3)->get();
        return view('welcome', compact('room_types'));
    }
}
