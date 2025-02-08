<x-app-layout>

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
            <h1 class="text-3xl font-bold mb-4">Edit Food Preference for {{ $user->name }}</h1>
            <form action="{{ route('food_preferences.update', $foodPreferences->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table class="min-w-full text-left text-sm">
                <thead>
                    <tr class="border-b">
                        <th class="px-4 py-2">Meal Time</th>
                        <th class="px-4 py-2">Will Eat?</th>
                    </tr>
                </thead>
                <tbody>
                   
                        <tr class="border-b">
                             <td class="px-4 py-2">{{ ucfirst($foodSchedule->meal_type) }} ({{ $foodSchedule->meal_date }})</td></td>
                            <input type="hidden" name="food_schedule_id[{{ $foodSchedule->id }}]" value="{{ $foodSchedule->id }}">
                            <td class="px-4 py-2">
                                <select name="will_eat[{{ $foodSchedule->id }}]" class="form-select block w-full mt-1">
                                <option value="yes"  @selected($foodPreferences->will_eat == 'yes')>Yes</option>
                                <option value="no"  @selected($foodPreferences->will_eat == 'no')>NO</option>
                                </select>
                                <x-input-error :messages="$errors->get('will_eat')" class="mt-2" />
                            </td>
                        </tr>
                   
                </tbody>
            </table>

            <div class="mt-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-800">Update Preferences</button>
            </div>
                
            </div>
        </div>
    </div>
</div>

</x-app-layout>