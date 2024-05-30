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
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                <i class="fa-solid fa-arrow-left w-3 h-3 me-2"></i>
                {{ $room_data['type']['to_date'] }}
            </button>
            <button type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                <i class="fa-solid fa-arrow-left w-3 h-3 me-2"></i>
                {{ $room_data['type']['room_count'] }}
            </button>
            <button type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                <i class="fa-solid fa-money-check-dollar w-3 h-3 me-2"></i>
                {{ $room_data['type']['price_range'] }}
            </button>
        </div>
        <div>
            <button type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                <i class="fa-solid fa-circle-check w-3 h-3 me-2"></i>
                Book Rooms
            </button>
        </div>
    </div>
    @if (count($room_data['rooms']) <= 0)
        <h2 class="text-center mt-10 text-xl text-red-600">No Rooms Available For Your Search!</h2>
        <h2 class="text-center mt-4 text-md text-gray-600">Please Choose Again!</h2>
    @endif
    <div class="grid gap-2 grid-cols-3 mt-10 pl-6">

        @foreach ($room_data['rooms'] as $room)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between bg-gray-50 rounded-t-md">
                    <a href="#">
                        <img class="rounded-t-lg w-10 m-2" src="{{ asset('hotel_logo.png') }}" alt="" />
                    </a>
                    <input type="checkbox" class="m-4">
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
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            <i class="fa-regular fa-star"></i>
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
@endsection
