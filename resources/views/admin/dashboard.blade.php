@extends('admin.layout')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
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

        {{-- Room List  --}}
        <hr class="mt-4">
        <div class=" flex justify-center mt-6 text-lg font-bold">
            <h1>Available Rooms ! ({{ date('d-m-Y', strToTime($rooms['type']['from_date'])) }})</h1>
        </div>
        <div class="my-4 flex justify-end">
            <div>
                <form action="{{ route('admin.room_booking.create') }}" method="GET" id="roomIdsContainer">
                    <input type="hidden" name="from_date" id="" value="{{ Carbon::now()->format('Y-m-d') }}">
                    <input type="hidden" name="to_date" id=""
                        value="{{ Carbon::now()->addDay()->format('Y-m-d') }}">
                    <input type="hidden" name="room_ids" id="roomIds">
                    {{-- <input type="hidden" name="room_ids" id="roomIds" value=""> --}}
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                        <i class="fa-solid fa-circle-check w-3 h-3 me-2"></i>
                        Book Rooms
                    </button>
                </form>
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
                            <td class="pl-4"><input class="roomCheckBox" type="checkbox" data-id="{{ $room->room_id }}">
                            </td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var roomIds = [];
        $(document).on('click', '.roomCheckBox', function() {
            var dataId = $(this).attr('data-id');
            var isChecked = $(this).hasClass('checked');

            if (isChecked) {
                // Remove the dataId from the array
                roomIds = roomIds.filter(id => id !== dataId);
            } else {
                // Add the dataId to the array
                roomIds.push(dataId);
            }

            // Toggle the 'checked' class
            $(this).toggleClass('checked');
            // Update the hidden input value with the comma-separated room IDs
            $('#roomIds').val();
            $('#roomIds').val(roomIds.join(','));
        });
    </script>
@endsection
