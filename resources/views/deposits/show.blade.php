<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Expense List') }}
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


            <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-8">Deposit Details</h1>

<!-- Deposit Card -->
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
    <div class="space-y-6">
        <!-- Deposit Info -->
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-xl font-medium text-gray-700 dark:text-gray-300">Deposit Information</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Detailed information about your deposit transaction</p>
            </div>
            @if ($deposit->status == 'pending')
            <span class="text-lg text-yellow-500 font-semibold">Pending</span>
            @elseif ($deposit->status == 'approved')
            <span class="text-lg text-green-500 font-semibold">Completed</span>
            @elseif ($deposit->status == 'rejected')
            <span class="text-lg text-red-500 font-semibold">Rejected</span>
            @endif
        </div>

        <div class="space-y-4">
            <!-- Amount -->
            <div class="flex justify-between">
                <span class="text-gray-600 dark:text-gray-300">Amount</span>
                <span class="font-semibold text-gray-800 dark:text-gray-200">{{$deposit->amount}}</span>
            </div>

            <!-- Date -->
            <div class="flex justify-between">
                <span class="text-gray-600 dark:text-gray-300">Date</span>
                <span class="text-gray-800 dark:text-gray-200">{{$deposit->created_at->toFormattedDateString()}}</span>
            </div>

            <!-- Status -->
            <div class="flex justify-between">
                <span class="text-gray-600 dark:text-gray-300">Status</span>
                @if ($deposit->status == 'pending')
            <span class="text-lg text-yellow-500 font-semibold">Pending</span>
            @elseif ($deposit->status == 'approved')
            <span class="text-lg text-green-500 font-semibold">Completed</span>
            @elseif ($deposit->status == 'rejected')
            <span class="text-lg text-red-500 font-semibold">Rejected</span>
            @endif
            </div>

            <!-- Transaction ID -->
            <div class="flex justify-between">
                <span class="text-gray-600 dark:text-gray-300">Transaction ID</span>
                <span class="text-gray-800 dark:text-gray-200">{{$deposit->id}}</span>
            </div>

            <!-- User -->
            <div class="flex justify-between">
                <span class="text-gray-600 dark:text-gray-300">User</span>
                <span class="text-gray-800 dark:text-gray-200">{{$deposit->user->name}}</span>
            </div>
            <!-- User -->
            <div class="flex justify-between">
                <span class="text-gray-600 dark:text-gray-300">Approved By</span>
                <span class="text-gray-800 dark:text-gray-200">{{$deposit->approvedBy->name}}</span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4 mt-8">
        <x-link-button href="{{ back() }}" text="Back" classes="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" />
        </div>
    </div>
</div>
                
            </div>
        </div>
    </div>
</div>

</x-app-layout>