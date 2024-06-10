<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomBooking;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class LocationController extends Controller
{
    public function adminDashboard()
    {
        $bookings = RoomBooking::with('room')->orderBy('from_date', 'asc')->get()->groupBy('user_room_booking_id');
        $collection = collect($bookings);

        // Step 3: Paginate the Collection
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 5; // Number of items per page
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $bookings = new LengthAwarePaginator($currentPageItems, $collection->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $rooms = Room::availableRoom();
        // return $bookings;
        return view('admin.dashboard', compact('bookings', 'rooms'));
    }
}
