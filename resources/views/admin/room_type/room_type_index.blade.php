@extends('admin.layout')

@section('content')
    <div class=" p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Our Room Type List
                    <p class="mt-1 mb-3 text-sm font-normal text-gray-500 dark:text-gray-400">Add Your Room Type List For Our
                        Hotel
                        Here!</p>
                    <a href="{{ route('room_type.create') }}"
                        class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                        Room Type</a>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Room Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pirce
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Score
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($room_types as $room_type)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $room_type->room_type }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $room_type->room_type_price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $room_type->room_type_score }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('room_type.edit', ['room_type' => $room_type->room_type_id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
