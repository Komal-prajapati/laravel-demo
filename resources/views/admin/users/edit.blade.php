<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users - Edit Deails') }}
        </h2>
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
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="px-6 py-4 grid grid-col-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                        </div>
                        <div>
                            <x-label for="email" :value="__('E-Mail')" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required />
                        </div>
                    </div>

                    <div class="px-6 py-4 grid grid-col-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-label for="password" :value="__('Password')" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" />
                        </div>
                        <div>
                            <x-label for="confirm_password" :value="__('Confirm Password')" />
                            <x-input id="confirm_password" class="block mt-1 w-full" type="password" name="confirm_password" />
                        </div>
                    </div>

                    <div class="px-6 py-4 grid grid-col-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-label for="address_line_1" :value="__('Address Line 1')" />
                            <x-input id="address_line_1" class="block mt-1 w-full" type="text" name="address_line_1" :value="$userSetting['address_line_1']" required />
                        </div>
                        <div>
                            <x-label for="address_line_2" :value="__('Address Line 2')" />
                            <x-input id="address_line_2" class="block mt-1 w-full" type="text" name="address_line_2" :value="$userSetting['address_line_2']" />
                        </div>
                    </div>

                    <div class="px-6 py-4 grid grid-col-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-label for="city" :value="__('City')" />
                            <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="$userSetting['city']" required />
                        </div>
                        <div>
                            <x-label for="pin_code" :value="__('Pin/Zip Code')" />
                            <x-input id="pin_code" class="block mt-1 w-full" type="text" name="pin_code" :value="$userSetting['pin_code']" />
                        </div>
                    </div>

                    <div class="px-6 py-4 grid grid-col-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-label for="state" :value="__('State')" />
                            <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="$userSetting['state']" required />
                        </div>
                        <div>
                            <x-label for="country" :value="__('Country')" />
                            <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="$userSetting['country']" />
                        </div>
                    </div>

                    <div class="px-6 py-4 grid grid-col-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-label for="contact_number" :value="__('Contact Number')" />
                            <x-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" :value="$userSetting['contact_number']" />
                        </div>
                    </div>

                    <div class="px-6 py-4">
                        <x-button>{{ __('Update') }}</x-button>
                        <a href="{{ route('admin.users') }}" class="ml-4 text-red-600 hover:text-red-900">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
