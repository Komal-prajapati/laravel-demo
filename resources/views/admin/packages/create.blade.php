<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Packages - Add New') }}
            </h2>

            <a href="{{ route('admin.packages') }}" class="bg-indigo-200 text-indigo-900 text-sm px-2 py-1 rounded hover:bg-indigo-300">All Packages</a>
        </div>
    </x-slot>

    <x-slot name="pageStyleSheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.legacy.min.css">
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
                <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="px-6 py-4 grid grid-col-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-label for="city" :value="__('City')" />
                            <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus />
                        </div>
                        <div>
                            <x-label for="country" :value="__('Country')" />
                            <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required />
                        </div>
                    </div>

                    <div class="px-6 py-4 grid grid-col-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-label for="pdf_file" :value="__('PDF File')" />
                            <input id="pdf_file" class="p-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="file" name="pdf_file" :value="old('pdf_file')" required />
                        </div>
                        <div>
                            <x-label for="image_file" :value="__('Image')" />
                            <input id="image_file" class="p-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="file" name="image_file" :value="old('image_file')" required />
                        </div>
                    </div>

                    <div class="px-6 py-4 grid grid-col-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-label for="price" :value="__('Price')" />
                            <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus />
                        </div>
                        <div>
                            <x-label for="category_id" :value="__('Select Category (Multiple allowed)')" />
                            <select name="category_id[]" id="category_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" multiple>
                                @foreach ($categories as $id => $category)
                                    <option value="{{ $id }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="px-6 py-4">
                        <div>
                            <x-label for="descritption" :value="__('Description')" />
                            <textarea rows="5" name="description" id="descritption" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" required>{{ old('descritption') }}</textarea>
                        </div>
                    </div>

                    <div class="px-6 py-4">
                        <x-button>{{ __('Add') }}</x-button>
                        <a href="{{ route('admin.packages') }}" class="ml-4 text-red-600 hover:text-red-900">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot name="pageJavaScript">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
        <script>
            $('#category_id').selectize({
                hideSelected: true,
                closeAfterSelected: true,
            });
        </script>
    </x-slot>
</x-app-layout>
