<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Package Enquiry Details') }}
            </h2>

            <a href="{{ route('packageEnquiries') }}" class="bg-indigo-200 text-indigo-900 text-sm px-2 py-1 rounded hover:bg-indigo-300">All Packages Enquiries</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg">
                <table class="table w-full">
                    <tbody>
                        <tr>
                            <th class="pl-6 text-left text-wider">Package Details:</th>
                            <td class="py-2 px-2 text-wider">{{ $packageDetails['city'] }}, {{ $packageDetails['country'] }}</td>
                        </tr>
                        <tr>
                            <th class="pl-6 text-left text-wider">Package Amount:</th>
                            <td class="py-2 px-2 text-wider">${{ number_format($packageDetails['price'], 2) }}</td>
                        </tr>
                        <tr>
                            <th class="pl-6 text-left text-wider">Package Leaflet PDF:</th>
                            <td class="py-2 px-2 text-wider">
                                <a href="{{ asset('storage'. $packageDetails['pdf']) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900 focus:text-indigo-900">View / Download</a>
                            </td>
                        </tr>
                        <tr>
                            <th class="pl-6 text-left text-wider">Enquired On:</th>
                            <td class="py-2 px-2 text-wider">{{ $enquiry->created_at->timezone('Asia/Kolkata')->format('dS F, Y h:m A') }}</td>
                        </tr>
                        <tr>
                            <th class="pl-6 text-left text-wider">Your Message/Query:</th>
                            <td class="py-2 px-2 text-wider">{{ $enquiry->message_content }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
