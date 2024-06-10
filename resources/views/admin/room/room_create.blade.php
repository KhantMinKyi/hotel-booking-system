@extends('admin.layout')
@section('content')
    <div class=" flex justify-center">
        <div
            class=" flex-grow-6 min-w-fit w-1/3 m-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form class="max-w-sm mx-auto" action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5 me-4">
                    <label for="room_photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose
                        Photo</label>
                    <input type="file" name="room_photo"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter Room Number" required />
                </div>
                <div class="grid grid-cols-2">
                    <div class="mb-5 me-4">
                        <label for="room_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                            Number</label>
                        <input type="text" name="room_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Room Number" required />
                    </div>
                    <div class="mb-5">
                        <label for="room_size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                            Size</label>
                        <input type="text" name="room_size" placeholder="Enter Room Size"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
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
                                <option value="{{ $amenity->amenity_id }}">{{ $amenity->amenity_name }}</option>
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
                                <option value="{{ $room_type->room_type_id }}">{{ $room_type->room_type }}</option>
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
                            placeholder="Enter Room Location (Floor)" required />
                    </div>
                    <div class="mb-5">
                        <label for="accessibility" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                            Accessibility</label>
                        <input type="text" name="accessibility"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Room Accessibility" required />
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
                            <option value="single">Single Bed</option>
                            <option value="double">Double Bed</option>
                            <option value="twin">Twin Bed</option>
                            <option value="family">Family Bed</option>
                        </select>

                    </div>
                    <div class="mb-5 ">
                        <label for="bathroom_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bath
                            Type</label>
                        <select name="bathroom_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose Bathroom Type</option>
                            <option value="shower">Shower</option>
                            <option value="bathtub">Bathtub</option>
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
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>

                    </div>
                    <div class="mb-5 me-2">
                        <label for="living_room_available"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Living Room ?</label>
                        <select name="living_room_available"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose One</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-5 ">
                        <label for="kitchen_available"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kitchen?</label>
                        <select name="kitchen_available"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose One</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
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
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>

                    </div>
                    <div class="mb-5 me-2">
                        <label for="can_smoke" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Can
                            Smoke ?</label>
                        <select name="can_smoke"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose One</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-5 ">
                        <label for="is_smart_tv"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Smart Tv?</label>
                        <select name="is_smart_tv"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Choose One</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

        </div>
    </div>
@endsection
