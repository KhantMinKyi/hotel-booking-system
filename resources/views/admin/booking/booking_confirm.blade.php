@extends('admin.layout')

@section('content')
    <div class="flex justify-center text-lg bg-gray-100 pt-2 font-bold">
        <div
            class="block w-1/2 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <div class="flex justify-between">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">My Vintage Hotel</h5>
                @if ($room_bookings[0]->status == 'pending')
                    <span class=" text-sm p-2 rounded-md bg-yellow-300">Pending</span>
                @elseif ($room_bookings[0]->status == 'cancel')
                    <span class=" text-sm p-2 rounded-md bg-red-500">Cancel</span>
                @elseif ($room_bookings[0]->status == 'approved')
                    <span class=" text-sm p-2 rounded-md bg-green-500">Approved</span>
                @elseif ($room_bookings[0]->status == 'user_cancel')
                    <span class=" text-sm p-2 rounded-md bg-orange-500">User Cancel Pending</span>
                @endif
            </div>
            <div class="my-5">
                <label for="booking_user_name" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Customer
                    Name</label>
                <p
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ $room_bookings[0]->booking_user_name }}</p>
            </div>
            <div class="my-5">
                <label for="booking_user_phone"
                    class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Customer
                    Phone</label>
                <p
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ $room_bookings[0]->booking_user_phone }}</p>
            </div>
            <div class="grid grid-cols- gap-">
                <div class="my-5">
                    <label for="booking_user_phone"
                        class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Checkin - Checkout</label>
                    <p
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        {{ $room_bookings[0]->from_date }} - {{ $room_bookings[0]->to_date }}</p>
                </div>
            </div>
            <div class="my-5">
                <label for="booking_user_phone"
                    class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Selected Rooms </label>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
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
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($room_bookings as $key => $room_booking)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="pl-4">{{ $key + 1 }}</td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $room_booking->room->room_number }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $room_booking->room->room_type->room_type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $room_booking->room->location }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $room_booking->room->bed_type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $room_booking->room->accessibility }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $room_booking->room->room_type->room_type_price }} Kyats
                                    </td>
                                </tr>
                                @php
                                    $total += $room_booking->room->room_type->room_type_price;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="my-5">
                <label for="booking_user_phone" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Total
                    Amount </label>
                <p id="total_amount"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ $total }} Kyats</p>
            </div>

            <div class="mb-5 me-4">
                <label for="deposit_type_select"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deposit
                    Type</label>
                <select name="deposit_type_select" id="deposit_type_select"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required disabled>
                    <option value="50" @if ($room_bookings[0]->deposit_type == '50') selected @endif>50%</option>
                    <option value="100" @if ($room_bookings[0]->deposit_type == '100') selected @endif>100%</option>
                </select>
            </div>
            <div class="my-5">
                <label for="booking_user_phone" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Paid
                    Amount </label>
                <p id="deposit_amount_show"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ $room_bookings[0]->deposit_amount }} Kyats</p>
            </div>
            <div class="mb-5 me-4">
                <label for="payment_type_select"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment
                    Type</label>
                <select name="payment_type_select" id="payment_type_select"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required disabled>
                    <option value="cb" @if ($room_bookings[0]->deposit_type == 'cb') selected @endif>CB</option>
                    <option value="cbpay" @if ($room_bookings[0]->deposit_type == 'cbpay') selected @endif>CBPay</option>
                    <option value="kbzpay" @if ($room_bookings[0]->deposit_type == 'kbzpay') selected @endif>KBZPay</option>
                    <option value="aya" @if ($room_bookings[0]->deposit_type == 'aya') selected @endif>AYA</option>
                    <option value="uab" @if ($room_bookings[0]->deposit_type == 'uab') selected @endif>UAB</option>
                </select>
            </div>
            <div class="my-5">
                <label for="reciver_account_show"
                    class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Reciver
                    Number </label>
                <p id="reciver_account_show"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ $room_bookings[0]->reciver_account }}
                </p>
            </div>
            <div>
                <form
                    action="{{ route('admin.adminBookingConfirm', ['room_booking' => $room_bookings[0]->room_booking_id]) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="my-5">
                        <label for="status" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Status
                        </label>
                        <select name="status" id="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="approved">Approved</option>
                            <option value="cancel">Cancel</option>
                            <option value="user_cancel">User Cancel</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    <div class="flex flex-row-reverse">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
