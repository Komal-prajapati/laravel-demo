<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories - Add New') }}
            </h2>

            <a href="{{ route('admin.categories') }}" class="bg-indigo-200 text-indigo-900 text-sm px-2 py-1 rounded hover:bg-indigo-300">All Categories</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('successMessage'))
                <div class="mb-4 bg-green-300 text-green-800 tracking-wider px-4 py-2 rounded">
                    {{ session('successMessage') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 bg-red-300 text-red-800 tracking-wider px-4 py-2 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf

                    <div class="px-6 py-4">
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <div class="px-6 py-4">
                        <x-button>{{ __('Add') }}</x-button>
                        <a href="{{ route('admin.categories') }}" class="ml-4 text-red-600 hover:text-red-900">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
