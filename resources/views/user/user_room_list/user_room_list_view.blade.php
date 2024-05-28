@extends('user.layout')
@section('content')
    <div class="flex justify-center text-lg bg-gray-100 pt-2 font-bold">
        Select Your Filter
    </div>
    <form class="flex pt-6 pb-4  justify-center bg-gray-100" action="{{ route('user_room_booking.search_view') }}"
        method="POST">
        @csrf
        {{-- <div class="me-4">
            <label for="room_type_id" class="sr-only">Search</label>
            <div class=" mx-6 " style="width: 200px;">
                <select name="room_type_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected disabled>Select Room Type</option>
                    <option value="">Select None</option>
                    @foreach ($room_types as $room_type)
                        <option value="{{ $room_type->room_type_id }}">{{ $room_type->room_type }}</option>
                    @endforeach
                </select>

            </div>
        </div> --}}
        <div date-rangepicker datepicker-buttons datepicker-autoselect-today datepicker-format="yyyy-mm-dd"
            class="flex items-center">
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input name="start" type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date start" required>
            </div>
            <span class="mx-4 text-gray-500">to</span>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input name="end" type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date end" required>
            </div>
        </div>
        <div class="me-4">
            <div class=" mx-6" style="width: 150px;">
                <input type="number" name="room_count"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Room Count" required />
            </div>
        </div>
        {{-- <div class="relative w-full max-w-sm ">
            <label for="price_range" class="sr-only">Labels range</label>
            <input name="price_range" type="range" value="150000" min="0" max="300000" id='labels-range-input'
                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
            <div class="flex justify-between mt-2 px-1 text-sm text-gray-500 dark:text-gray-400">
                <span>0</span>
                <span>150000</span>
                <span>300000</span>
            </div>
            <div id="range-value" class="mt-2 text-sm text-gray-700 dark:text-gray-200 text-center">
                Price: 0 - 150000 Kyats
            </div>
        </div> --}}

        {{-- Date Range Filter --}}


        <div>
            <button type="submit"
                class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </form>

    <div class="grid gap-2 grid-cols-3 mt-10 pl-6">
        @foreach ($room_types as $room_type)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Room Type - {{ $room_type->room_type }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price - {{ $room_type->room_type_price }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Rooms -
                        {{ $room_type->rooms->count() }}</p>
                    <div>
                        <p class="mb-1 text-xl font-bold text-gray-700 dark:text-gray-400">Accessibility -
                        </p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            @if (count($room_type->rooms) > 0)
                                {{ $room_type->rooms[0]->accessibility }}
                            @endif
                        </p>
                        <hr class="my-2">
                    </div>
                    <div>
                        <p class="mb-1 text-xl font-bold text-gray-700 dark:text-gray-400">Amenities -
                        </p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            @if (count($room_type->rooms) > 0)
                                {{ $room_type->rooms[0]->amenity->amenity_description }}
                            @endif
                        </p>
                        <hr class="my-2">
                    </div>
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
