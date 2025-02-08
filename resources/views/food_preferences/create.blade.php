<x-app-layout>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
            <h1 class="text-3xl font-bold mb-4">Set Food Preference for {{ $user->name }}</h1>

<form action="{{ route('food_preferences.store') }}" method="POST">
    @csrf
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4">
            <label for="food_schedule_id" class="block text-sm font-medium text-gray-700">Food Schedule</label>
            <select id="food_schedule_id" name="food_schedule_id" class="form-select mt-1 block w-full">
                @foreach($foodSchedules as $schedule)
                    <option value="{{ $schedule->id }}">{{ $schedule->meal_type }} on {{ $schedule->meal_date }}</option>
                @endforeach
            </select>
            @error('food_schedule_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="will_eat" class="block text-sm font-medium text-gray-700">Will Eat</label>
            <input type="checkbox" id="will_eat" name="will_eat" class="form-checkbox mt-1" value="1" {{ old('will_eat') ? 'checked' : '' }}>
            @error('will_eat')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="auto_meal" class="block text-sm font-medium text-gray-700">Auto Apply to Future Dates</label>
            <input type="checkbox" id="auto_meal" name="auto_meal" class="form-checkbox mt-1" value="1" {{ old('auto_meal') ? 'checked' : '' }}>
            @error('auto_meal')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-800">Save Preference</button>
        </div>
    </div>
</form>
                
            </div>
        </div>
    </div>
</div>

</x-app-layout>