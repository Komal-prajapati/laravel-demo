<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users - View Deails') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg">
                <table class="table w-full">
                    <tbody>
                        <tr>
                            <th class="py-2 pl-6 text-left">Name</th>
                            <td class="py-2 pl-2 text-wider">{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pl-6 text-left">E-Mail</th>
                            <td class="py-2 pl-2 text-wider">{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pl-6 text-left">Contact Number</th>
                            <td class="py-2 pl-2 text-wider">{{ $userSetting['contact_number'] }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pl-6 text-left">Package Enquiries Count</th>
                            <td class="py-2 pl-2 text-wider">{{ \App\Models\PackageEnquiry::where('user_id', $user->id)->get()->count() }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pl-6 text-left">Address Line 1</th>
                            <td class="py-2 pl-2 text-wider">{{ $userSetting['address_line_1'] }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pl-6 text-left">Address Line 2</th>
                            <td class="py-2 pl-2 text-wider">{{ $userSetting['address_line_2'] }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pl-6 text-left">City</th>
                            <td class="py-2 pl-2 text-wider">{{ $userSetting['city'] }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pl-6 text-left">Pin/Zip Code</th>
                            <td class="py-2 pl-2 text-wider">{{ $userSetting['pin_code'] }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pl-6 text-left">State</th>
                            <td class="py-2 pl-2 text-wider">{{ $userSetting['state'] }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pl-6 text-left">Country</th>
                            <td class="py-2 pl-2 text-wider">{{ $userSetting['country'] }}</td>
                        </tr>
                        <tr>
                            <th class="py-2 pl-6 text-left">Action</th>
                            <td class="py-2 pl-2 text-wider">
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 focus:text-indigo-900">Edit This User</a>

                                    <a href="{{ route('admin.users') }}" class="text-red-600 hover:text-red-900 focus:text-red-900">Cancel</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
