@extends('admin.layout')
@section('content')
    <div class=" flex flex-auto">
        <div class=" w-full m-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form class="max-w-sm mx-auto" action="{{ route('room_type.update', ['room_type' => $room_type->room_type_id]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="room_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                        Type</label>
                    <input type="text" name="room_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter Room Type" value="{{ $room_type->room_type }}" required />
                </div>
                <div class="mb-5">
                    <label for="room_type_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                        Type Price</label>
                    <input type="number" name="room_type_price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $room_type->room_type_price }}" required />
                </div>
                <div class="mb-5">
                    <label for="room_type_score" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                        Type
                        Score</label>
                    <input type="number" name="room_type_score"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $room_type->room_type_score }}" required />
                </div>
                <button type="submit"
                    class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Update</button>
            </form>

        </div>
        <div class="m-4">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos sit magnam, error officiis nam dicta consequuntur
            temporibus consequatur porro, quia minus nostrum veritatis accusantium debitis quisquam sunt. Optio, inventore
            eligendi.
        </div>
    </div>
@endsection
