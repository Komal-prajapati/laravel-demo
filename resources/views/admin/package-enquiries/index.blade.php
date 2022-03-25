<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Package Enquiries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg">
                <table class="table w-full">
                    <thead class="bg-gray-300 border-b">
                        <th class="py-2 pl-2 uppercase text-gray-800 tracking-wider">Id</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">User Details</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">Package Details</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">Enquired On</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">PDF Leaflet</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">View</th>
                    </thead>
                    <tbody>
                        @forelse ($enquiries as $enquiry)
                            <tr class="border-b">
                                <td class="py-2 pl-2 w-24 text-center">{{ $enquiry->id }}</td>
                                <td class="py-2 pl-2 text-wider">
                                    {{ $enquiry->user_details['name'] }}<br />
                                    {{ $enquiry->user_details['email'] }} / {{ $enquiry->user_contact_number }}
                                </td>
                                <td class="py-2 pl-2 text-wider">
                                    {{ $enquiry->package_details['city'] }}, {{ $enquiry->package_details['country'] }}, ${{ number_format($enquiry->package_details['price'], 2) }}
                                </td>
                                <td class="py-2 pl-2 text-wider">
                                    {{ $enquiry->created_at->timezone('Asia/Kolkata')->format('dS M, Y h:i A') }}
                                </td>
                                <td class="py-2 pl-2 text-wider">
                                    <a href="{{ asset('storage'. $enquiry->package_details['pdf']) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900 focus:text-indigo-900">View/Download</a>
                                </td>
                                <td class="py-2 pl-2 text-wider">
                                    <a href="{{ route('admin.packageEnquiries.show', $enquiry->id) }}" class="text-indigo-600 hover:text-indigo-900 focus:text-indigo-900">View</a>
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
