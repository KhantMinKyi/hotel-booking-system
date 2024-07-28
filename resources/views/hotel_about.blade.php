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
                <a href="/user/signup"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">SignUp</a>
                <a href="/hotel_about"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">About
                    Us</a>
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
            style="background-image: url('{{ asset('hotel_banner.jpg') }}'); "></div>

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
    <section class="bg-blue-50 dark:bg-slate-800" id="contact">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="mb-4">
                <div class="mb-6 max-w-3xl text-center sm:text-center md:mx-auto md:mb-12">
                    <p class="text-base font-semibold uppercase tracking-wide text-blue-600 dark:text-blue-200">
                        Contact
                    </p>
                    <h2
                        class="font-heading mb-4 font-bold tracking-tight text-gray-900 dark:text-white text-3xl sm:text-5xl">
                        Get in Touch
                    </h2>
                    <p class="mx-auto mt-4 max-w-3xl text-xl text-gray-600 dark:text-slate-400">Vintage Hotel
                    </p>
                </div>
            </div>
            <div class="flex items-stretch justify-center">
                <div class="grid md:grid-cols-2">
                    <div class="h-full pr-6">
                        <p class="mt-3 mb-12 text-lg text-gray-600 dark:text-slate-400">
                            Welcome to Our Hotel in Thanlyin Township, Yangon: Located near the serene Bago River and
                            vibrant Star City, our hotel offers a perfect blend of comfort and convenience. Enjoy modern
                            amenities, exceptional service, and easy access to local attractions like Kyauktan Ye Le
                            Pagoda
                            and traditional markets. Experience the charm of Yangon from the heart of Thanlyin. Book
                            your
                            stay today!
                        </p>
                        <ul class="mb-6 md:mb-0">
                            <li class="flex">
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                        <path
                                            d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-4 mb-4">
                                    <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 dark:text-white">Our
                                        Address
                                    </h3>
                                    <p class="text-gray-600 dark:text-slate-400">Building A-5, Star City</p>
                                    <p class="text-gray-600 dark:text-slate-400">Thanlyin, Yangon</p>
                                </div>
                            </li>
                            <li class="flex">
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                        <path
                                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                        </path>
                                        <path d="M15 7a2 2 0 0 1 2 2"></path>
                                        <path d="M15 3a6 6 0 0 1 6 6"></path>
                                    </svg>
                                </div>
                                <div class="ml-4 mb-4">
                                    <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 dark:text-white">Contact
                                    </h3>
                                    <p class="text-gray-600 dark:text-slate-400">Mobile: +95 (997) 457-666</p>
                                    <p class="text-gray-600 dark:text-slate-400">Mail: vintagehotel@gmail.com</p>
                                </div>
                            </li>
                            <li class="flex">
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                        <path d="M12 7v5l3 3"></path>
                                    </svg>
                                </div>
                                <div class="ml-4 mb-4">
                                    <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 dark:text-white">About
                                        Hotel
                                    </h3>
                                    <p class="text-gray-600 dark:text-slate-400">Floor - 6th Floor</p>
                                    <p class="text-gray-600 dark:text-slate-400">Gym,Parking,Swimming Pool Available
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card h-fit max-w-6xl p-5 md:p-12" id="form">
                        <h2 class="mb-4 text-2xl font-bold dark:text-white">Hotel Photo</h2>
                        <img src="{{ asset('hotel_photo.jpg') }} " alt="">
                        {{-- <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('{{ asset('hotel_banner.jpg') }}'); "></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</html>
