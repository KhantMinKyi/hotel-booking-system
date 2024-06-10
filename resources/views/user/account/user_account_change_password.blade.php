@extends('user.layout')

@section('content')
    <div class="flex justify-center my-5 ">
        <div
            class="w-full max-w-xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            @if (session('error'))
                <div class=" p-4 text-red-500 text-sm font-semibold">
                    {{ session('error') }}
                </div>
            @endif
            <form class="space-y-6" action="{{ route('user.user_password_update') }}" method="POST">
                @csrf
                @method('PUT')
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Change Password</h5>
                <div>
                    <label for="old_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Old
                        Password</label>
                    <input type="password" name="old_password" id="old_password" placeholder="Enter Old Password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required />
                </div>
                <div>
                    <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        New Password</label>
                    <input type="password" name="new_password" id="new_password" placeholder="Enter Password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required />
                </div>
                <div>
                    <label for="confirm_new_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                        New Password</label>
                    <input type="password" name="confirm_new_password" id="confirm_new_password"
                        placeholder="Enter New Password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required />
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Change</button>
            </form>
        </div>
    </div>
@endsection
