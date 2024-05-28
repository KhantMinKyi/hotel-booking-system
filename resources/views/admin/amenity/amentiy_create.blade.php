@extends('admin.layout')
@section('content')
    <div class=" flex flex-auto">
        <div class=" w-1/2  m-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Amenity Form User Manual</h1>
            <section class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-700 border-b-2 border-gray-300 pb-2 mb-4">Amenity Name</h2>
                <p class="text-gray-600 mb-4">Please write the name of the amenity in the "Amenity Name" field. Examples of
                    amenity names include:</p>
                <ul class="list-disc list-inside text-gray-600">
                    <li>Superior Amenity</li>
                    <li>Deluxe Amenity</li>
                    <li>Tech Amenity</li>
                </ul>
            </section>
            <section class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-700 border-b-2 border-gray-300 pb-2 mb-4">Amenity Description
                </h2>
                <p class="text-gray-600">In the "Amenity Description" field, please provide more details about the amenity.
                    This can include its features, benefits, and any other relevant information.</p>
            </section>
            <section class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-700 border-b-2 border-gray-300 pb-2 mb-4">Amenity Score</h2>
                <p class="text-gray-600">Please write the score for that amenity from the hotel in the "Amenity Score"
                    field. This score should reflect the hotel's rating of the amenity on a scale of 1 to 10.</p>
            </section>
        </div>
    </div>
@endsection
