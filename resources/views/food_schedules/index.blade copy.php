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
            <x-link-button href="{{ route('food_schedules.create') }}" text="Create Schedule" classes="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" icon="<i class='fas fa-tachometer-alt'></i>" />

                <!-- User List Table -->
                <table class="min-w-full text-left">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Type</th>
                            <th class="px-4 py-2 text-left">Cutoff Time</th>
                            <th class="px-4 py-2 text-left">Meal Date</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($foodSchedules->isEmpty())
                            <tr>
                                <td colspan="5" class="border px-4 py-2 text-center">No food schedules found.</td>
                            </tr>
                        @endif
                        <!-- Loop through users (replace this with dynamic content from your backend) -->
                        @foreach($foodSchedules as $schedule)
                            <tr>
                                <td class="border px-4 py-2">{{ $schedule->id }}</td>
                                <td class="border px-4 py-2">{{ $schedule->meal_type }}</td>
                                <td class="border px-4 py-2">{{ $schedule->cutoff_time }}</td>
                                <td class="border px-4 py-2">{{ $schedule->meal_date }}</td>
                                <td class="border px-4 py-2 flex space-x-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('food_schedules.edit', $schedule->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('food_schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this schedule?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination (if needed) -->
                <div class="mt-4">
                    {{ $foodSchedules->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>