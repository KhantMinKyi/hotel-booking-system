@extends('user.layout')

@section('content')
    <div class="relative h-96 ">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('{{ asset('hotel_banner.jpg') }}'); filter: blur(2px);"></div>

        <!-- Blurred Background Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Text Container -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-white text-center">
                <h1 class="text-4xl font-bold">My Vintage Hotel</h1>
                <p class="mt-4 text-lg">Select Your Rooms Here ! </p>
                <p class="mt-4 text-sm text-opacity-60 text-white">Hurry Up And Contact With Us for More Detail ! </p>
            </div>
        </div>
    </div>
    <div class="grid gap-2 grid-cols-3 mt-10 pl-6">

        @foreach ($rooms as $room)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                </a>
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
