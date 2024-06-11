@extends('user.layout')

@section('content')
    <div class=" p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Our Room Lists
                    <p class="mt-1 mb-3 text-sm font-normal text-gray-500 dark:text-gray-400">Add Your Rooms For Our
                        Hotel
                        Here!</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Room Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Room Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bed Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Location
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $room->room_type->room_type }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $room->room_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $room->bed_type }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $room->location }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('user_room_review.show', ['user_room_review' => $room->room_id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Review</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $rooms->links() }}
    </div>
@endsection
