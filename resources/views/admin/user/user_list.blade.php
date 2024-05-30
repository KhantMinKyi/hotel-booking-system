@extends('admin.layout')

@section('content')
    {{-- Admin List --}}
    <div class=" flex justify-center mt-6 mb-4 text-lg font-bold">
        <h1>Admin List</h1>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class=" flex justify-end">
            <a href="{{ route('user_list.create') }}"
                class="m-4 p-2 px-4 text-sm bg-green-300 hover:bg-green-400 rounded-md font-semibold text-gray-800">Add
                New Admin</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gmail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admin_users as $admin_no => $admin_user)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $admin_no + 1 }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $admin_user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $admin_user->email }}
                        </td>
                        <td class="px-6 py-4 font-medium">
                            {{ $admin_user->username }}
                        </td>
                        <td class="px-6 py-4 font-medium">
                            {{ $admin_user->phone }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('user_list.show', ['user_list' => $admin_user->id]) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i
                                    class="fa fa-regular mr-2 fa-eye"></i></a>
                            <a href="{{ route('user_list.edit', ['user_list' => $admin_user->id]) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="m-2">
            {{ $admin_users->links() }}
        </div>
    </div>
    {{-- Customer List --}}
    <div class=" flex justify-center mt-10 mb-4 text-lg font-bold">
        <h1>Customer List</h1>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gmail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer_users as $customer_no => $customer_user)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $customer_no + 1 }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $customer_user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $customer_user->email }}
                        </td>
                        <td class="px-6 py-4 font-medium">
                            {{ $customer_user->username }}
                        </td>
                        <td class="px-6 py-4 font-medium">
                            {{ $customer_user->phone }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="m-2">
            {{ $customer_users->links() }}
        </div>
    </div>
@endsection
