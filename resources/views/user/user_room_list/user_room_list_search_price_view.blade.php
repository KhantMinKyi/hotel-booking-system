@extends('user.layout')

@section('content')
    <div class="my-4 flex justify-evenly">
        <div class="inline-flex rounded-md shadow-sm" role="group">
            <button type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                <i class="fa-solid fa-arrow-right w-3 h-3 me-2"></i>
                {{ $room_data['type']['from_date'] }}
            </button>
            <button type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                <i class="fa-solid fa-arrow-left w-3 h-3 me-2"></i>
                {{ $room_data['type']['to_date'] }}
            </button>
        </div>
        <div>
            <form action="{{ route('user_room_booking.create') }}" method="GET" id="roomIdsContainer">
                <input type="hidden" name="from_date" id="" value="{{ $room_data['type']['from_date'] }}">
                <input type="hidden" name="to_date" id="" value="{{ $room_data['type']['to_date'] }}">
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
    <div class="grid gap-2 grid-cols-3 mt-10 pl-6">

        @foreach ($room_data['rooms'] as $room)
            @php
                $total_score = $room->total_score;
                $average_score = round($total_score * 0.5, 2);
                [$whole_number, $point_number] = explode('.', $average_score);
                // $remain_whole_numeber = 5 - $whole_number;
            @endphp
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between bg-gray-50 rounded-t-md">
                    <a href="#">
                        <img class="rounded-t-lg w-10 m-2" src="{{ asset('hotel_logo.png') }}" alt="" />
                    </a>
                    <input type="checkbox" data-id="{{ $room->room_id }}" class="m-4 roomCheckBox">
                </div>
                <img src="{{ asset('/images/' . $room->room_photo) }}" alt="" class="mb-2">
                <div class="p-5">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $room->room_number }}
                        </h5>
                        <span class="text-md text-gray-600">
                            {{ $room->room_type->room_type }}
                        </span>
                        <div>
                            @for ($i = 0; $i < $whole_number; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                            @if ($point_number >= 5)
                                <i class="fa-solid fa-star-half-stroke"></i>
                            @endif
                            <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $average_score }}
                                out
                                of 5</span>
                        </div>
                        <div class="mb-2">
                            <p class="mb-2 text-lg font-bold text-gray-700 dark:text-gray-400">Amenities</p>
                            <span>
                                {{ $room->amenity->amenity_description }}
                            </span>
                            <hr class="mt-1">
                        </div>
                        <div class="mb-2">
                            <p class="mb-1 font-bold text-xl">Accessibility</p>
                            <span>
                                {{ $room->accessibility }}
                            </span>
                            <hr class="mt-1">
                        </div>
                        <div class="mb-2">
                            <p class="mb-1 font-bold text-lg">Room Size</p>
                            <span>
                                {{ $room->room_size }}
                            </span>
                            <hr class="mt-1">
                        </div>
                        <div class="mb-2">
                            <p class="mb-1 font-bold text-lg">Location</p>
                            <span>
                                {{ $room->location }}
                            </span>
                            <hr class="mt-1">
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="mb-2">
                                <p class="mb-1 font-bold text-lg">Bed Type</p>
                                <span>
                                    {{ $room->bed_type }}
                                </span>
                                <hr class="mt-1">
                            </div>
                            <div class="mb-2">
                                <p class="mb-1 font-bold text-lg">Bathroom</p>
                                <span>
                                    {{ $room->bathroom_type }}
                                </span>
                                <hr class="mt-1">
                            </div>
                        </div>
                        <div class="grid grid-cols-3 mb-2">
                            <div>
                                <p class="mb-1 font-bold text-lg">Extra
                                    @if ($room->can_extra_bad == 1)
                                        <i class="fa-solid fa-check"></i>
                                    @else
                                        <i class="fa-solid fa-xmark"></i>
                                    @endif
                                </p>
                                <hr class="mt-4">
                            </div>
                            <div>
                                <p class="mb-1 font-bold text-lg">Living-Room
                                    @if ($room->living_room_available == 1)
                                        <i class="fa-solid fa-check"></i>
                                    @else
                                        <i class="fa-solid fa-xmark"></i>
                                    @endif
                                </p>
                                <hr class="mt-4">
                            </div>
                            <div>
                                <p class="mb-1 font-bold text-lg">Kitchen
                                    @if ($room->kitchen_available == 1)
                                        <i class="fa-solid fa-check"></i>
                                    @else
                                        <i class="fa-solid fa-xmark"></i>
                                    @endif
                                </p>
                                <hr class="mt-4">
                            </div>
                        </div>
                        <div class="grid grid-cols-3 mb-2">
                            <div>
                                <p class="mb-1 font-bold text-lg">Corridor
                                    @if ($room->corridor_available == 1)
                                        <i class="fa-solid fa-check"></i>
                                    @else
                                        <i class="fa-solid fa-xmark"></i>
                                    @endif
                                </p>
                                <hr class="mt-4">
                            </div>
                            <div>
                                <p class="mb-1 font-bold text-lg">Smoke
                                    @if ($room->can_smoke == 1)
                                        <i class="fa-solid fa-check"></i>
                                    @else
                                        <i class="fa-solid fa-xmark"></i>
                                    @endif
                                </p>
                                <hr class="mt-4">
                            </div>
                            <div>
                                <p class="mb-1 font-bold text-lg">Smart Tv
                                    @if ($room->is_smart_tv == 1)
                                        <i class="fa-solid fa-check"></i>
                                    @else
                                        <i class="fa-solid fa-xmark"></i>
                                    @endif
                                </p>
                                <hr class="mt-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

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
