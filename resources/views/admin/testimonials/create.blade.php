<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Testimonials - Add New') }}
            </h2>

            <a href="{{ route('admin.testimonials') }}" class="bg-indigo-200 text-indigo-900 text-sm px-2 py-1 rounded hover:bg-indigo-300">All Testimonials</a>
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
                <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="px-6 py-4 grid grid-col-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-label for="person_name" :value="__('Person Name')" />
                            <x-input id="person_name" class="block mt-1 w-full" type="text" name="person_name" :value="old('person_name')" required autofocus />
                        </div>
                        <div>
                            <x-label for="company_name" :value="__('Company Name')" />
                            <x-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" />
                        </div>
                    </div>

                    <div class="px-6 py-4">
                        <x-label for="image_file" :value="__('Image')" />
                        <input id="image_file" class="p-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="file" name="image_file" :value="old('image_file')" accept="image/jpg, image/jpeg, image/png" />
                    </div>

                    <div class="px-6 py-4">
                        <x-label for="content" :value="__('Content')" />
                        <textarea rows="5" name="content" id="content" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" required>{{ old('content') }}</textarea>
                    </div>

                    <div class="px-6 py-4">
                        <x-button>{{ __('Add') }}</x-button>
                        <a href="{{ route('admin.testimonials') }}" class="ml-4 text-red-600 hover:text-red-900">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
