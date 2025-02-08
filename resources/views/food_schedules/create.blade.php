<x-app-layout>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
            <h2 class="text-xl font-semibold mb-4">Food Schedule Creation</h2>

                <!-- Food Schedule Creation Form -->
                <form action="{{ route('food_schedules.store') }}" method="POST">
        @csrf
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Meal Type Option -->
            <div class="mb-4">
                <label for="meal_type" class="block text-sm font-medium text-gray-700">Meal Type</label>
                <select name="meal_type" id="meal_type" class="form-select block w-full mt-1">
            <option value="breakfast">Breakfast</option>
            <option value="lunch">Lunch</option>
            <option value="dinner">Dinner</option>
        </select>
        <x-input-error :messages="$errors->get('meal_type')" class="mt-2" />

            </div>
            <!-- Meal Value Multiplier -->
            <div class="mt-4">
            <x-input-label for="meal_value" :value="__('Meal Value')" />
            <x-text-input id="meal_value" class="block mt-1 w-full" type="text" name="meal_value" :value="old('meal_value')"  autocomplete="meal_value" />
            <x-input-error :messages="$errors->get('meal_value')" class="mt-2" />
        </div>
            <!-- Cutoff Time -->
            <div class="mt-4">
            <x-input-label for="cutoff_time" :value="__('Cutoff Time (Optional)')" />
            <x-text-input id="cutoff_time" class="block mt-1 w-full" type="time" name="cutoff_time" :value="old('cutoff_time')"  autocomplete="cutoff_time" />
            <x-input-error :messages="$errors->get('cutoff_time')" class="mt-2" />
        </div>
        <!-- Meal Date -->
        <div class="mt-4">
            <x-input-label for="meal_date" :value="__('Meal Date')" />
            <x-text-input id="meal_date" class="block mt-1 w-full" type="date" name="meal_date" :value="old('meal_date')"  autocomplete="meal_date" />
            <x-input-error :messages="$errors->get('meal_date')" class="mt-2" />
        </div>
        
        <!-- Meal Date End -->
        <div class="mt-4">
            <x-input-label for="meal_date_end" :value="__('Meal Date End ')" />
            <x-text-input id="meal_date_end" class="block mt-1 w-full" type="date" name="meal_date_end" :value="old('meal_date_end')"  autocomplete="meal_date_end" />
            <x-input-error :messages="$errors->get('meal_date_end')" class="mt-2" />
        </div>

            <div class="mt-4">
            <x-primary-button class="ms-4">
                {{ __('Submit') }}
            </x-primary-button>
            </div>
        </div>
    </form>


                
            </div>
        </div>
    </div>
</div>

</x-app-layout>