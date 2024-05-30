@extends('admin.layout')
@section('content')
    <div class=" flex justify-center">
        <div
            class=" flex-grow-6 min-w-fit w-1/3 m-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form class="max-w-sm mx-auto" action="{{ route('room.update', ['room' => $room->room_id]) }}" method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="grid grid-cols-3">
                    <div class="mb-5 me-4 col-span-2">
                        <label for="room_photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                            Photo</label>
                        <input type="file" name="room_photo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Room Number" value="{{ $room->room_photo }}" />
                    </div>
                    <div class="mb-5">
                        <img src="{{ asset('/images/' . $room->room_photo) }}" alt="" class="mb-2 rounded-t-md">
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="mb-5 me-4">
                        <label for="room_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                            Number</label>
                        <input type="text" name="room_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Room Number" required value="{{ $room->room_number }}" />
                    </div>
                    <div class="mb-5">
                        <label for="room_size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                            Size</label>
                        <input type="text" name="room_size" placeholder="Enter Room Size"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required value="{{ $room->room_size }}" />
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="mb-5 me-4">
                        <label for="amenity_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amenity</label>
                        <select name="amenity_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose Amenity</option>
                            @foreach ($amenities as $amenity)
                                <option value="{{ $amenity->amenity_id }}"
                                    @if ($amenity->amenity_id == $room->amenity_id) selected @endif>{{ $amenity->amenity_name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-5">
                        <label for="room_type_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                            Type</label>
                        <select name="room_type_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose Room Type</option>
                            @foreach ($room_types as $room_type)
                                <option value="{{ $room_type->room_type_id }}"
                                    @if ($room_type->room_type_id == $room->room_type_id) selected @endif>{{ $room_type->room_type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="mb-5 me-4">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                            Location (Floor)</label>
                        <input type="text" name="location"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Room Location (Floor)" required value="{{ $room->location }}" />
                    </div>
                    <div class="mb-5">
                        <label for="accessibility" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                            Accessibility</label>
                        <input type="text" name="accessibility"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Room Accessibility" required value="{{ $room->accessibility }}" />
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="mb-5 me-4">
                        <label for="bed_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bed
                            Type</label>
                        <select name="bed_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose Bed Type</option>
                            <option value="single" @if ($room->bed_type == 'single') selected @endif>Single Bed</option>
                            <option value="double" @if ($room->bed_type == 'double') selected @endif>Double Bed</option>
                            <option value="twin" @if ($room->bed_type == 'twin') selected @endif>Twin Bed</option>
                            <option value="family" @if ($room->bed_type == 'family') selected @endif>Family Bed</option>
                        </select>

                    </div>
                    <div class="mb-5 ">
                        <label for="bathroom_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bed
                            Type</label>
                        <select name="bathroom_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose Bathroom Type</option>
                            <option value="shower" @if ($room->bathroom_type == 'shower') selected @endif>Shower</option>
                            <option value="bathtub" @if ($room->bathroom_type == 'bathtub') selected @endif>Bathtub</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-3">
                    <div class="mb-5 me-2">
                        <label for="can_extra_bad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Can
                            Extra Bed?</label>
                        <select name="can_extra_bad"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose One</option>
                            <option value="1" @if ($room->can_extra_bad == '1') selected @endif>Yes</option>
                            <option value="0" @if ($room->can_extra_bad == '0') selected @endif>No</option>
                        </select>

                    </div>
                    <div class="mb-5 me-2">
                        <label for="living_room_available"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Living Room ?</label>
                        <select name="living_room_available"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose One</option>
                            <option value="1" @if ($room->living_room_available == '1') selected @endif>Yes</option>
                            <option value="0" @if ($room->living_room_available == '0') selected @endif>No</option>
                        </select>
                    </div>
                    <div class="mb-5 ">
                        <label for="kitchen_available"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kitchen?</label>
                        <select name="kitchen_available"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose One</option>
                            <option value="1" @if ($room->kitchen_available == '1') selected @endif>Yes</option>
                            <option value="0" @if ($room->kitchen_available == '0') selected @endif>No</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-3">
                    <div class="mb-5 me-2">
                        <label for="corridor_available"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Corridor?</label>
                        <select name="corridor_available"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose One</option>
                            <option value="1" @if ($room->corridor_available == '1') selected @endif>Yes</option>
                            <option value="0" @if ($room->corridor_available == '0') selected @endif>No</option>
                        </select>

                    </div>
                    <div class="mb-5 me-2">
                        <label for="can_smoke" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Can
                            Smoke ?</label>
                        <select name="can_smoke"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose One</option>
                            <option value="1" @if ($room->can_smoke == '1') selected @endif>Yes</option>
                            <option value="0" @if ($room->can_smoke == '0') selected @endif>No</option>
                        </select>
                    </div>
                    <div class="mb-5 ">
                        <label for="is_smart_tv"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Smart Tv?</label>
                        <select name="is_smart_tv"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose One</option>
                            <option value="1" @if ($room->is_smart_tv == '1') selected @endif>Yes</option>
                            <option value="0" @if ($room->is_smart_tv == '0') selected @endif>No</option>
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Update</button>
            </form>

        </div>
    </div>
@endsection
