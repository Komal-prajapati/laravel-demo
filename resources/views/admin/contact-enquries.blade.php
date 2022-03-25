<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Enquires') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg">
                <table class="table w-full">
                    <thead class="bg-gray-300 border-b">
                        <th class="py-2 pl-2 uppercase text-gray-800 tracking-wider">Id</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">Name</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">E-Mail</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">Contact</th>
                        <th class="py-2 pl-2 uppercase text-left text-gray-800 tracking-wider">Message</th>
                    </thead>
                    <tbody>
                        @forelse ($enquiries as $enquiry)
                            <tr class="border-b">
                                <td class="py-2 pl-2 w-16 text-center">{{ $enquiry->id }}</td>
                                <td class="py-2 pl-2 w-36 text-wider">{{ $enquiry->full_name }}</td>
                                <td class="py-2 pl-2 w-36 text-wider">{{ $enquiry->email }}</td>
                                <td class="py-2 pl-2 w-36 text-wider">{{ $enquiry->contact_number }}</td>
                                <td class="py-2 px-2 w-96 text-wider">{{ $enquiry->message_content }}</td>
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
