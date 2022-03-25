<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>

            <a href="{{ route('admin.users.create') }}" class="bg-indigo-200 text-indigo-900 text-sm px-2 py-1 rounded hover:bg-indigo-300">Add New</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('successMessage'))
                <div class="mb-4 bg-green-300 text-green-800 tracking-wider px-4 py-2 rounded">
                    {{ session('successMessage') }}
                </div>
            @endif

            @if (session()->has('customErrorMessage'))
                <div class="mb-4 bg-red-300 text-red-800 tracking-wider px-4 py-2 rounded">
                    {{ session('customErrorMessage') }}
                </div>
            @endif

            <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg">
                <table class="table w-full">
                    <thead class="bg-gray-300 border-b">
                        <th class="py-2 pl-2 uppercase text-gray-800 tracking-wider">Id</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">Name</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">E-Mail</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">Contact</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">No. of Package Enq</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">Action</th>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="border-b">
                                <td class="py-2 pl-2 w-24 text-center">{{ $user->id }}</td>
                                <td class="py-2 pl-2 text-wider">{{ $user->name }}</td>
                                <td class="py-2 pl-2 text-wider">{{ $user->email }}</td>
                                <td class="py-2 pl-2 text-wider">{{ json_decode($user->settings, true)['contact_number'] }}</td>
                                <td class="py-2 pl-2 text-wider">
                                    <a href="{{ route('admin.packageEnquiries', ['user' => $user->id]) }}" class="text-indigo-600 hover:text-indigo-900 focus:text-indigo-900">{{ \App\Models\PackageEnquiry::where('user_id', $user->id)->get()->count() }}</a>
                                </td>
                                <td class="py-2 pl-2 text-wider">
                                    <div class="flex items-center space-x-4">
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 focus:text-indigo-900">Show</a>

                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 focus:text-indigo-900">Edit</a>

                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submmit" class="text-red-600 hover:text-red-900 focus:text-red-900">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-2 text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
