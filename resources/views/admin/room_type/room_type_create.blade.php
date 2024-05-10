@extends('admin.layout')
@section('content')
    <div class=" flex flex-auto">
        <div class=" w-full m-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form class="max-w-sm mx-auto" action="{{ route('amenity.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="amenity_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amenity
                        Name</label>
                    <input type="text" name="amenity_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter Amenity Name" required />
                </div>
                <div class="mb-5">
                    <label for="amenity_description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amenity Description</label>
                    <textarea type="text" name="amenity_description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required></textarea>
                </div>
                <div class="mb-5">
                    <label for="amenity_score" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amenity
                        Score</label>
                    <input type="number" name="amenity_score"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

        </div>
        <div class="m-4">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos sit magnam, error officiis nam dicta consequuntur
            temporibus consequatur porro, quia minus nostrum veritatis accusantium debitis quisquam sunt. Optio, inventore
            eligendi.
        </div>
    </div>
@endsection
