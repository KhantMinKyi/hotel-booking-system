@extends('admin.layout')

@section('content')
    <div class="m-4">
        <div class=" flex justify-center mt-6 mb-4 text-lg font-bold">
            <h1>Booking List</h1>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Room Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Room Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date (Checkin-Checkout)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $booking->room->room_number }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $booking->room->room_type->room_type }}
                            </td>
                            <td class="px-6 py-4 font-medium">
                                {{ $booking->booking_user_name }}
                            </td>
                            <td class="px-6 py-4 font-medium">
                                {{ $booking->booking_user_phone }}
                            </td>
                            <td class="px-6 py-4 font-medium">
                                {{ $booking->from_date }} to {{ $booking->to_date }}
                            </td>
                            <td class="px-6 py-4 font-medium text-black">
                                @if ($booking->status == 'pending')
                                    <span class="p-2 rounded-md bg-yellow-300">Pending</span>
                                @elseif ($booking->status == 'cancel')
                                    <span class="p-2 rounded-md bg-red-500">Cancel</span>
                                @elseif ($booking->status == 'approved')
                                    <span class="p-2 rounded-md bg-green-500">Approved</span>
                                @elseif ($booking->status == 'user_cancel')
                                    <span class="p-2 rounded-md bg-orange-500">User Cancel Pending</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Response</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="m-2">
                {{ $bookings->links() }}
            </div>
        </div>

        {{-- Room List  --}}
        <hr class="mt-4">
        <div class=" flex justify-center mt-6 text-lg font-bold">
            <h1>Available Rooms ! ({{ date('d-m-Y', strToTime($rooms['type']['from_date'])) }})</h1>
        </div>
        <div class="my-4 flex justify-end">
            <div>
                <button type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                    <i class="fa-solid fa-circle-check w-3 h-3 me-2"></i>
                    Book Rooms
                </button>
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th></th>
                        <th scope="col" class="px-6 py-3">
                            Room Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Room Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Location
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bed Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Accessibility
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Room Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms['rooms'] as $room)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="pl-4"><input type="checkbox"></td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $room->room_number }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $room->room_type->room_type }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $room->location }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $room->bed_type }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $room->accessibility }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $room->room_type->room_type_price }} Kyats
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('room.show', ['room' => $room->room_id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i
                                        class="fa-regular fa-eye me-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
