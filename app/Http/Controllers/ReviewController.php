<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with('room_type')->orderBy('total_score', 'desc')->paginate(10);
        return view('user.room_review.room_list', compact('rooms'));
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
        $validated = $request->validate([
            'room_id' => 'required',
            'total_score' => 'required',
            'user_id' => 'required',
        ]);
        $validated['create_date'] = Carbon::now()->format('Y-m-d');
        Review::create($validated);
        $total_predefine_weight = [
            'user_max_score' => 3,
        ];
        $room = Room::find($validated['room_id']);
        $room_reviews = Review::where('room_id', $validated['room_id'])->get();
        $review_count = count($room_reviews);
        $review_score = 0;
        foreach ($room_reviews as $room_review) {
            $review_score += $room_review->total_score;
        }
        $average_review_score = ($review_score * $total_predefine_weight['user_max_score']) / ($review_count * 5);

        $room = Room::find($validated['room_id']);
        $total_score = $room->admin_score + $room->system_score + $average_review_score;
        $room->update([
            'review_score' => $average_review_score,
            'total_score' => $total_score,
        ]);
        return redirect()->route('user_room_review.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::find($id);
        if (!$room) {
            return redirect()->back();
        }
        return view('user.room_review.room_detail', compact('room'));
        // return $id;s
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
