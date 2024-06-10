@extends('user.layout')

@section('content')
    <div class="flex justify-center my-5 ">
        <div
            class="w-full max-w-xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="#">
                <div class="flex justify-between">
                    <h5 class="text-xl font-medium text-gray-900 dark:text-white">Your Account Detail</h5>
                    <div>
                        <a href="{{ route('user.user_edit') }}"
                            class="text-sm px-4 py-2 bg-yellow-300 rounded-md font-bold hover:bg-yellow-600 hover:text-white">Edit
                            Profile</a>
                        <a href="{{ route('user.user_change_password_show') }}"
                            class="text-sm px-4 py-2 bg-cyan-300 rounded-md font-bold hover:bg-cyan-600 hover:text-white">Change
                            Password</a>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="name@company.com" required disabled value="{{ $user->email }}" />
                    </div>
                    <div>
                        <label for="user_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            Username</label>
                        <input type="text" name="user_name" id="user_name" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required disabled value="{{ $user->username }}" />
                    </div>
                </div>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        Name</label>
                    <input type="text" name="name" id="name" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required disabled value="{{ $user->name }}" />
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        Phone Number</label>
                    <input type="text" name="phone" id="phone" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required disabled value="{{ $user->phone }}" />
                </div>

            </form>
        </div>
    </div>
    <div class="m-4">
        <div class=" flex justify-center mt-6 mb-4 text-lg font-bold">
            <h1>Confirm Booking List</h1>
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
                    @foreach ($user_bookings as $booking)
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
                                <a href="{{ route('user_room_booking.show', ['user_room_booking' => $booking->room_booking_id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i
                                        class="fa-regular fa-eye me-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="m-2">
                {{ $user_bookings->links() }}
            </div>
        </div>

        <hr class="mt-4">
    </div>
@endsection
