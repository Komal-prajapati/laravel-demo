<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Newsletter Subscriptions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg">
                <table class="table w-full">
                    <thead class="bg-gray-300 border-b">
                        <th class="py-2 pl-2 uppercase text-gray-800 tracking-wider">Id</th>
                        <th class="py-2 pl-2 uppercase text-gray-800 tracking-wider">E-Mail</th>
                        <th class="py-2 pl-2 uppercase text-gray-800 tracking-wider">Status</th>
                    </thead>
                    <tbody>
                        @forelse ($subscriptions as $subscription)
                            <tr class="border-b">
                                <td class="py-2 pl-2 text-center">{{ $subscription->id }}</td>
                                <td class="py-2 pl-2 text-center text-wider">{{ $subscription->email }}</td>
                                <td class="flex items-center justify-center py-2 pl-2 text-center text-wider">
                                    @if ($subscription->status == 1)
                                        <span class="text-green-800 font-bold">&check; Yes</span>
                                    @else
                                        <span class="text-red-800 font-bold">&times; No</span>
                                    @endif

                                    <form method="POST" action="{{ route('admin.toggleEmailSubsStatus', $subscription->id) }}">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit" class="ml-2 bg-indigo-200 text-indigo-900 text-sm px-2 py-1">Change</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-2 text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
