<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Packages') }}
            </h2>

            <a href="{{ route('admin.packages.create') }}" class="bg-indigo-200 text-indigo-900 text-sm px-2 py-1 rounded hover:bg-indigo-300">Add New</a>
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
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">City</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">Country</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">Price</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">Action</th>
                    </thead>
                    <tbody>
                        @forelse ($packages as $package)
                            <tr class="border-b">
                                <td class="py-2 pl-2 w-16 text-center">{{ $package->id }}</td>
                                <td class="py-2 pl-2 w-36 text-wider">{{ $package->city }}</td>
                                <td class="py-2 pl-2 w-36 text-wider">{{ $package->country }}</td>
                                <td class="py-2 pl-2 w-36 text-wider">{{ number_format($package->price, 2) }}</td>
                                <td class="py-2 px-2 w-96 text-wider space-x-4">
                                    <div class="flex items-center">
                                        <a href="{{ route('admin.packages.edit', $package->id) }}" class="text-indigo-600 hover:text-indigo-900 focus:text-indigo-900">Edit</a>

                                        <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submmit" class="ml-4 text-red-600 hover:text-red-900 focus:text-red-900">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-2 text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
