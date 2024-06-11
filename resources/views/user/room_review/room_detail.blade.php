@extends('user.layout')

@section('content')
    <style>
        .star {
            font-size: 2rem;
            color: grey;
            cursor: pointer;
        }

        .star.selected {
            color: gold;
        }
    </style>
    <div class="flex justify-center mt-4">
        <div>
            @php
                $total_score = $room->total_score;
                $average_score = round($total_score * 0.5, 2);
                [$whole_number, $point_number] = explode('.', $average_score);
                // $remain_whole_numeber = 5 - $whole_number;
            @endphp
            <div
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
                    <form action="{{ route('user_room_review.store') }}" method="POST">
                        @csrf
                        <div class="flex justify-center text-lg font-bold">
                            Rate Us !
                        </div>
                        <div id="star-rating" class="flex justify-center">
                            <span class="star" data-value="0.5">&#9733;</span>
                            <span class="star" data-value="1.0">&#9733;</span>
                            <span class="star" data-value="1.5">&#9733;</span>
                            <span class="star" data-value="2.0">&#9733;</span>
                            <span class="star" data-value="2.5">&#9733;</span>
                            <span class="star" data-value="3.0">&#9733;</span>
                            <span class="star" data-value="3.5">&#9733;</span>
                            <span class="star" data-value="4.0">&#9733;</span>
                            <span class="star" data-value="4.5">&#9733;</span>
                            <span class="star" data-value="5.0">&#9733;</span>
                        </div>
                        <input type="hidden" id="rating-value" name="total_score">
                        <input type="hidden" id="room_id" name="room_id" value="{{ $room->room_id }}">
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                        <div class=" flex justify-center">
                            <button type="submit"
                                class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 mt-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Rate
                                This Room Now!</button>
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).on('click', '.star', function() {
            var rating = $(this).data('value');
            $('#rating-value').val(rating);

            $('.star').removeClass('selected');
            $('.star').each(function() {
                if ($(this).data('value') <= rating) {
                    $(this).addClass('selected');
                }
            });
        });
    </script>
@endsection
