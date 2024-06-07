@extends('user.layout')

@section('content')
    <div class="flex justify-center text-lg bg-gray-100 pt-2 font-bold">
        <div
            class="block w-1/2 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                acquisitions
                2021</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions
                of
                2021 so far, in reverse chronological order.</p>
            <span class="my-4 text-sm text-red-400">
                If you want to change anything about your information , you can change in account setting .
            </span>
            <div class="my-5">
                <label for="booking_user_name" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Your
                    Name</label>
                <p
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ Auth::user()->name }}</p>
            </div>
            <div class="my-5">
                <label for="booking_user_phone" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Your
                    Phone</label>
                <p
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ Auth::user()->phone }}</p>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <div class="my-5">
                    <label for="booking_user_phone"
                        class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Total
                        Rooms</label>
                    <p
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        {{ count($rooms) }}</p>
                </div>
                <div class="my-5">
                    <label for="booking_user_phone"
                        class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Checkin - Checkout</label>
                    <p
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        {{ $from_date }} - {{ $to_date }}</p>
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
                                $room_ids = '';
                            @endphp
                            @foreach ($rooms as $no => $room)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="pl-4">{{ $no + 1 }}</td>
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
                                </tr>
                                @php
                                    $total += $room->room_type->room_type_price;
                                    if ($no == 0) {
                                        $room_ids .= $room->room_id;
                                    } else {
                                        $room_ids .= ',' . $room->room_id;
                                    }

                                @endphp
                            @endforeach
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="px-6 py-4"> Total -</td>
                            <td class="px-6 py-4">{{ $total }} Kyats</td>
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
                    required>
                    <option selected disabled>Choose Deposit Type</option>
                    <option value="50">50%</option>
                    <option value="100">100%</option>
                </select>
            </div>
            <div class="my-5">
                <label for="booking_user_phone" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Paid
                    Amount </label>
                <p id="deposit_amount_show"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ $total }} Kyats</p>
            </div>
            <div class="mb-5 me-4">
                <label for="payment_type_select"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment
                    Type</label>
                <select name="payment_type_select" id="payment_type_select"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option selected disabled>Choose Payment Type</option>
                    <option value="cb">CB</option>
                    <option value="cbpay">CBPay</option>
                    <option value="kbzpay">KBZPay</option>
                    <option value="aya">AYA</option>
                    <option value="uab">UAB</option>
                </select>
            </div>
            <div class="my-5">
                <label for="reciver_account_show"
                    class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Reciver
                    Number </label>
                <p id="reciver_account_show"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    Choose From Payment Type
                </p>
            </div>
            <form action="{{ route('user_room_booking.store') }}" method="POST">
                @csrf
                <input type="hidden" name="booking_user_name" value="{{ Auth::user()->name }}">
                <input type="hidden" name="booking_user_phone" value="{{ Auth::user()->phone }}">
                <input type="hidden" name="from_date" value="{{ $from_date }}">
                <input type="hidden" name="to_date" value="{{ $to_date }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="created_user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="deposit_type" id="deposit_type">
                <input type="hidden" name="deposit_amount" id="deposit_amount">
                <input type="hidden" name="payment_type" id="payment_type">
                <input type="hidden" name="room_ids" value="{{ $room_ids }}">
                <input type="hidden" name="reciver_account" id="reciver_account">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Book
                    Now!</button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).on('change', '#deposit_type_select', function() {
            var depositType = $(this).val();
            var totalAmount = parseFloat($('#total_amount').text());
            var depositAmount = parseFloat($('#deposit_amount_show').text());
            if (depositType == '50') {
                depositAmount = totalAmount * 1 / 2;
            } else {
                depositAmount = totalAmount;
            }
            $('#deposit_amount_show').text(depositAmount + " Kyats");
            $('#deposit_amount').val(depositAmount);
            $('#deposit_type').val(depositType);
        });
        $(document).on('change', '#payment_type_select', function() {
            var paymentType = $(this).val();
            if (paymentType == 'cb') {
                $('#reciver_account_show').text("8678-7867-3452-9867 ( Daw Thazin Tun )");
                $('#reciver_account').val("8678-7867-3452-9867 ( Daw Thazin Tun )");
            } else if (paymentType == 'kbzpay') {
                $('#reciver_account_show').text("0998678548 ( Daw Thazin Tun )");
                $('#reciver_account').val("0998678548 ( Daw Thazin Tun )");
            } else if (paymentType == 'cbpay') {
                $('#reciver_account_show').text("0998678548 ( Daw Thazin Tun )");
                $('#reciver_account').val("0998678548 ( Daw Thazin Tun )");
            } else if (paymentType == 'aya') {
                $('#reciver_account_show').text("8954-3565-2344-7678 ( Daw Thazin Tun )");
                $('#reciver_account').val("8954-3565-2344-7678 ( Daw Thazin Tun )");
            } else if (paymentType == 'uab') {
                $('#reciver_account_show').text("6456-2344-5666-4546 - ( Daw Thazin Tun )");
                $('#reciver_account').val("6456-2344-5666-4546 - ( Daw Thazin Tun )");
            }
            $('#payment_type').val(paymentType);
        });
    </script>
@endsection
