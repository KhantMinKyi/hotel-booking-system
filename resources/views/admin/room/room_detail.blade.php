@extends('admin.layout')

@section('content')
    <div class="flex justify-center mt-4">
        <div>
            @php
                $total_score = $room->total_score;
                $average_score = round($total_score * 0.5, 2);
                [$whole_number, $point_number] = explode('.', $average_score);
                // $remain_whole_numeber = 5 - $whole_number;
            @endphp
            <a href="#"
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                {{-- <img style="width: 100px" class="m-4" src="{{ asset('hotel_logo.png') }}" alt=""> --}}
                <div class="flex flex-col justify-between leading-normal">
                    <img src="{{ asset('/images/' . $room->room_photo) }}" alt="" class="mb-2 rounded-t-md">
                    <div class="p-6 ">
                        <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $room->room_number }}
                            ( {{ $room->room_type->room_type_price }} Kyats)
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
            </a>

        </div>
    </div>
@endsection
