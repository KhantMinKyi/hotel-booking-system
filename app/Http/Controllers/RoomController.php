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

    private function calculatePairScore($num1, $num2)
    {
        $product = $num1 * $num2;

        // Normalize the product to a score between 1 and 10
        $normalizedScore = $this->normalizeScore($product);

        return $normalizedScore;
    }

    private function normalizeScore($product)
    {
        $maxProduct = 40 * 40;
        $minProduct = 5 * 5;

        // Map the product value to a range between 1 and 10
        $score = 1 + (($product - $minProduct) * 10) / ($maxProduct - $minProduct);

        return $score;
    }

    private function WeightSumMethodAlogrithm($validated)
    {
        // Start WSM Algorithm
        $total_predefine_weight = [
            'admin_max_score' => 2.5,
            'system_max_score' => 3.5,
            'user_max_score' => 4,
        ];
        $total_weight = [
            'admin_score' => 0,
            'system_score' => 0,
            'user_score' => 0,
        ];

        // Calcluate The Admin Score
        $amenity = Amenity::find($validated['amenity_id']);
        $room_type = RoomType::find($validated['room_type_id']);
        $amenity_score = $amenity->amenity_score;
        $room_type_score = $room_type->room_type_score;
        $average_amenity_score = 100 * $amenity_score / 10;
        $average_room_type_score = 100 * $room_type_score / 10;
        $admin_average_score =
            ($average_amenity_score + $average_room_type_score) * $total_predefine_weight['admin_max_score'] / (2 * 100);

        // Calculate System Score
        $admin_predifined_max_score = [
            'room_size_max_score'       => 0.5,
            'location_max_score'        => 0.5,
            'accessibility_max_score'   => 0.4,
            'bed_type_max_score'        => 0.3,
            'bath_type_max_score'       => 0.2,
            'extra_max_score'           => 0.2,
            'living_room_max_score'     => 0.4,
            'kitchen_max_score'         => 0.3,
            'corridor_max_score'        => 0.3,
            'can_smoke_max_score'       => 0.2,
            'smart_tv_max_score'        => 0.2,
        ];
        // for room_size_max_score
        $room_size_score = 0;
        list($num1, $num2) = explode('x', $validated['room_size']);
        $num1 = (int)$num1;
        $num2 = (int)$num2;
        $score = $this->calculatePairScore($num1, $num2);
        $room_size_score += $score;
        $room_size_score = min($room_size_score, 10);
        $average_room_size_score = ($room_size_score) * $admin_predifined_max_score['room_size_max_score'] / (10);
        // return $average_room_size_score;

        // location score
        $location_score = 0;
        $floor_number = $validated['location'];
        $firstLetter = substr($floor_number, 0, 1);
        if ($firstLetter == 1) {
            $location_score = 3;
        } else if ($firstLetter == 2) {
            $location_score = 4;
        } else if ($firstLetter == 3) {
            $location_score = 5;
        } else if ($firstLetter == 4) {
            $location_score = 6;
        } else if ($firstLetter == 5) {
            $location_score = 8;
        } else if ($firstLetter == 6) {
            $location_score = 10;
        }
        $average_location_score = ($location_score) * $admin_predifined_max_score['location_max_score'] / (10);
        // return $location_score;


        // for bed type
        $bed_type_score = 0;
        if ($validated['bed_type'] == 'single') {
            $bed_type_score = 4;
        } else if ($validated['bed_type'] == 'double') {
            $bed_type_score = 6;
        } else if ($validated['bed_type'] == 'twin') {
            $bed_type_score = 8;
        } else if ($validated['bed_type'] == 'family') {
            $bed_type_score = 10;
        }
        $average_bed_type_score  = ($bed_type_score) * $admin_predifined_max_score['bed_type_max_score'] / (10);

        // for accessibility_max_score
        $average_accessibility_score = $admin_predifined_max_score['accessibility_max_score'];



        // for bath type
        $bath_type_score = 0;
        if ($validated['bathroom_type'] == 'shower') {
            $bath_type_score = 6;
        } else if ($validated['bathroom_type'] == 'bathtub') {
            $bath_type_score = 8;
        }
        $average_bath_type_score  = ($bath_type_score) * $admin_predifined_max_score['bath_type_max_score'] / (10);

        // extra bed
        $extra_score = 0;
        if ($validated['can_extra_bad'] == 0) {
            $extra_score = 5;
        } else if ($validated['can_extra_bad'] == 1) {
            $extra_score = 10;
        }
        $average_extra_score  = ($extra_score) * $admin_predifined_max_score['extra_max_score'] / (10);

        // Living Room
        $living_room_score = 0;
        if ($validated['living_room_available'] == 0) {
            $living_room_score = 5;
        } else if ($validated['living_room_available'] == 1) {
            $living_room_score = 10;
        }
        $average_living_room_score  = ($living_room_score) * $admin_predifined_max_score['living_room_max_score'] / (10);
        // Kitchen
        $kitchen_score = 0;
        if ($validated['kitchen_available'] == 0) {
            $kitchen_score = 5;
        } else if ($validated['kitchen_available'] == 1) {
            $kitchen_score = 10;
        }
        $average_kitchen_score  = ($kitchen_score) * $admin_predifined_max_score['kitchen_max_score'] / (10);
        // corridor
        $corridor_score = 0;
        if ($validated['corridor_available'] == 0) {
            $corridor_score = 5;
        } else if ($validated['corridor_available'] == 1) {
            $corridor_score = 10;
        }
        $average_corridor_score  = ($corridor_score) * $admin_predifined_max_score['corridor_max_score'] / (10);
        // Can Smoke
        $can_smoke_score = 0;
        if ($validated['can_smoke'] == 0) {
            $can_smoke_score = 5;
        } else if ($validated['can_smoke'] == 1) {
            $can_smoke_score = 10;
        }
        $average_can_smoke_score  = ($can_smoke_score) * $admin_predifined_max_score['can_smoke_max_score'] / (10);
        // Living Room
        $smart_tv_score = 0;
        if ($validated['is_smart_tv'] == 0) {
            $smart_tv_score = 5;
        } else if ($validated['is_smart_tv'] == 1) {
            $smart_tv_score = 10;
        }
        $average_smart_tv_score  = ($smart_tv_score) * $admin_predifined_max_score['smart_tv_max_score'] / (10);

        $total_average_system_score =
            $average_room_size_score +
            $average_location_score +
            $average_bed_type_score +
            $average_accessibility_score +
            $average_bath_type_score +
            $average_extra_score +
            $average_living_room_score +
            $average_kitchen_score +
            $average_corridor_score +
            $average_can_smoke_score +
            $average_smart_tv_score;
        $total_weight['system_score'] = round($total_average_system_score, 2);
        $total_weight['admin_score'] = round($admin_average_score, 2);
        return $total_weight;
    }
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
        // $image = $request->file('room_photo');
        // $image_name = uniqid() . $image->getClientOriginalName();
        // $image->move(public_path('/images'), $image_name);
        // $validated['room_photo'] = $image_name;
        // return $validated;
        $total_weight = $this->WeightSumMethodAlogrithm($validated);
        $validated['admin_score'] = $total_weight['admin_score'];
        $validated['system_score'] = $total_weight['system_score'];
        // return $validated;
        // End WSM Algorithm
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
