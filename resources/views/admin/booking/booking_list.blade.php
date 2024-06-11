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
                                @foreach ($booking as $room_data)
                                    ({{ $room_data->room->room_number }})
                                @endforeach
                            </th>
                            <td class="px-6 py-4">
                                @foreach ($booking as $room_data)
                                    ({{ $room_data->room->room_type->room_type }})
                                @endforeach
                            </td>
                            <td class="px-6 py-4 font-medium">
                                {{ $booking[0]->booking_user_name }}
                            </td>
                            <td class="px-6 py-4 font-medium">
                                {{ $booking[0]->booking_user_phone }}
                            </td>
                            <td class="px-6 py-4 font-medium">
                                {{ $booking[0]->from_date }} to {{ $booking[0]->to_date }}
                            </td>
                            <td class="px-6 py-4 font-medium text-black">
                                @if ($booking[0]->status == 'pending')
                                    <span class="p-2 rounded-md bg-yellow-300">Pending</span>
                                @elseif ($booking[0]->status == 'cancel')
                                    <span class="p-2 rounded-md bg-red-500">Cancel</span>
                                @elseif ($booking[0]->status == 'approved')
                                    <span class="p-2 rounded-md bg-green-500">Approved</span>
                                @elseif ($booking[0]->status == 'user_cancel')
                                    <span class="p-2 rounded-md bg-orange-500">User Cancel Pending</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.bookingConfrimShow', ['room_booking' => $booking[0]->room_booking_id]) }}"
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
    </div>
@endsection
