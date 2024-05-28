<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomBooking;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function adminDashboard()
    {
        $bookings = RoomBooking::with('room')->latest()->paginate(5);
        $rooms = Room::availableRoom();
        // return $bookings;
        return view('admin.dashboard', compact('bookings', 'rooms'));
    }
}
