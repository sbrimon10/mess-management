<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Food Schedule List') }}
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
        @if($groupedFoodSchedules->isNotEmpty())
            @foreach ($groupedFoodSchedules as $scheduleMonth => $foodSchedules)
            @php
            // Parse the date
            $date = \Carbon\Carbon::parse($scheduleMonth);
            @endphp
                <!-- Accordion -->
    <div x-data="{ open: false }">
        <div class="mb-4">
            <button @click="open = !open" class="w-full @if($date->isFriday()) bg-red-500 @else bg-blue-500 @endif text-white p-4 rounded-lg shadow-lg flex justify-between items-center focus:outline-none">
                <span>{{ $date->format('l'); }} {{\Carbon\Carbon::parse($scheduleMonth)->format('F j, Y')}}</span>
                <span x-show="!open">&#x25BC;</span>
                <span x-show="open">&#x25B2;</span>
            </button>

            <!-- Accordion Content -->
            <div x-show="open" x-collapse class="mt-4 overflow-x-auto bg-gray-700 text-white rounded-lg p-4 shadow-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 text-left">Meal Type</th>
                            <th class="py-2 px-4 text-left">Cutoff Time</th>
                            <th class="py-2 px-4 text-left">Meal Value</th>
                            <th class="py-2 px-4 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($foodSchedules as $meal)
                        <tr>
                            <td class="py-2 px-4">{{ ucfirst($meal->meal_type) }}</td>
                            <td class="py-2 px-4">{{ \Carbon\Carbon::parse($meal->cutoff_time)->format('h:i A') }}</td>
                            <td class="py-2 px-4">{{ $meal->meal_value_multiplier }}</td>
                            <td class="py-2 px-4"><a href="{{ route('food_schedules.edit', $meal->id) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endforeach
@endif

            </div>
        </div>
    </div>
</div>

</x-app-layout>