<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>


    <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed w-full z-10">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
            <a href="{{ route('welcome.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('hotel_logo.png') }}" class="h-8" alt="My Vintage Hotel Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">My Vintage
                    Hotel</span>
            </a>
            <div class="flex items-center md:order-2 space-x-1 md:space-x-2 rtl:space-x-reverse">
                <a href="/user/login-form"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</a>
                <a href="signup"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">SignUp</a>
                <button data-collapse-toggle="mega-menu-icons" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mega-menu-icons" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div id="mega-menu-icons" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">

            </div>
        </div>
    </nav>
    {{-- <div class="h-96 bg-cover bg-center" style="background-image: url('{{ asset('hotel_banner.jpg') }}');">
    </div> --}}
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

        @foreach ($room_types as $room_type)
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                </a>
                <div class="p-5">
                    <div>
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Room Type - {{ $room_type->room_type }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price -
                            {{ $room_type->room_type_price }}
                        </p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Rooms -
                            {{ $room_type->rooms->count() }}</p>
                        <hr class="my-2">
                    </div>
                    <div>
                        <p class="mb-1 text-xl font-bold text-gray-700 dark:text-gray-400">Accessibility -
                        </p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ $room_type->rooms[0]->accessibility }}
                        </p>
                        <hr class="my-2">
                    </div>
                    <div>
                        <p class="mb-1 text-xl font-bold text-gray-700 dark:text-gray-400">Amenities -
                        </p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ $room_type->rooms[0]->amenity->amenity_description }}
                        </p>
                        <hr class="my-2">
                    </div>
                    <a href="/user/login-form"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach


    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</html>
