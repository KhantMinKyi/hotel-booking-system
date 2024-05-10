<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amenities = Amenity::all();
        return view('admin.amenity.amenity_index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.amenity.amentiy_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amenity_name' => 'required|string',
            'amenity_description' => 'required|string',
            'amenity_score' => 'required|numeric',
        ]);
        Amenity::create($validated);
        return redirect()->route('amenity.index');
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
        $amenity = Amenity::find($id);
        if (!$amenity) {
            return redirect()->back();
        }
        return view('admin.amenity.amenity_edit', compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $amenity = Amenity::find($id);
        if (!$amenity) {
            return redirect()->back();
        }
        $validated = $request->validate([
            'amenity_name' => 'required|string',
            'amenity_description' => 'required|string',
            'amenity_score' => 'required|numeric',
        ]);
        $amenity->update($validated);
        return redirect()->route('amenity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
