<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Food Preference List') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if(session('success'))
    <x-alert type="success" message="{{ session('success') }}" dismissable="true" />
    @endif
    @if(session('error'))
    <x-alert type="error" message="{{ session('error') }}" dismissable="true" />
    @endif
    

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
            <x-link-button href="{{ route('deposits.create') }}" text="Set Preference" classes="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" icon="<i class='fas fa-tachometer-alt'></i>" />

                <!-- User List Table -->
                <table class="min-w-full text-left">
                    <thead>
                        <tr>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Rejection Comment</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($deposits->isEmpty())
                            <tr>
                                <td colspan="5" class="border px-4 py-2 text-center">No  depsit found.</td>
                            </tr>
                        @endif
                        <!-- Loop through users (replace this with dynamic content from your backend) -->
                        @foreach ($deposits as $deposit)
                            <tr class="@if($deposit->status === 'pending') bg-yellow-500 text-white @elseif($deposit->status === 'rejected') bg-red-500 text-white @elseif($deposit->status === 'approved') bg-green-500 text-white @endif">
                               
           <td class="border px-4 py-2"><span class="flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 7.5.415-.207a.75.75 0 0 1 1.085.67V10.5m0 0h6m-6 0h-1.5m1.5 0v5.438c0 .354.161.697.473.865a3.751 3.751 0 0 0 5.452-2.553c.083-.409-.263-.75-.68-.75h-.745M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>
{{ number_format($deposit->amount, 2) }}</span></td>   <!-- Admins see the user's name -->

                               
                           
                                <td class="border px-4 py-2">@if($deposit->status === 'pending')
                                    Pending
                                @elseif($deposit->status === 'approved')
                                    Approved
                                @elseif($deposit->status === 'rejected')
                                    Rejected
                                @endif</td>
                               
                                
                                <td class="border px-4 py-2">{{ $deposit->deposited_at ? $deposit->deposited_at : 'N/A' }}</td>
                                <td class="border px-4 py-2">@if($deposit->status === 'rejected')
                                    <p>{{ $deposit->rejection_comment ?? 'No comment provided' }}</p>
                                @else
                                    <p>N/A</p>
                                @endif</td>
                                
                                <td class="border px-4 py-2 flex space-x-2">
                                @if($deposit->status === 'pending')
                                <a href="{{ route('admin.deposits.review', $deposit) }}" class="text-blue-600 hover:text-blue-800">Review</a>
                            @else
                                <span class="text-gray-500">N/A</span>
                            @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination (if needed) -->
                
            </div>
        </div>
    </div>
</div>

</x-app-layout>