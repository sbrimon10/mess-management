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
                    <x-link-button href="{{ route('food_preferences.create') }}" text="Set Preference" 
                                   classes="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" 
                                   icon="<i class='fas fa-tachometer-alt'></i>" />

                    <div class="mt-6">
                        <h3 class="font-bold text-xl mb-4">Select Date</h3>
                        <div class="grid grid-cols-7 gap-4">
                            @foreach($foodPreferences as $mealDate => $preferences)
                                <div class="relative">
                                    <a href="{{ route('food_preferences.index', ['date' => $mealDate]) }}" 
                                       class="block p-4 text-center rounded-lg {{ $mealDate == $date ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-gray-200' }} 
                                       {{ $mealDate == now()->toDateString() ? 'border-4 border-yellow-400' : '' }}">
                                        {{ \Carbon\Carbon::parse($mealDate)->format('M d, Y') }}
                                    </a>
                                    @if($mealDate == now()->toDateString())
                                        <span class="absolute top-0 right-0 bg-yellow-400 text-white text-xs rounded-full px-2 py-1">Today</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-6">
                        @if($foodPreferences->isEmpty())
                            <p class="text-center text-gray-500">No food preferences found for the selected date.</p>
                        @else
                            <div class="space-y-4">
                                @foreach($foodPreferences[$date] as $preference)
                                    <div class="accordion" x-data="{ open: false }">
                                        <div class="bg-white shadow-lg rounded-lg">
                                            <button @click="open = ! open" 
                                                    class="w-full text-left p-4 font-medium bg-gray-100 text-gray-900 rounded-lg focus:outline-none">
                                                {{ $preference->foodSchedule->meal_type }} on {{ \Carbon\Carbon::parse($preference->meal_date)->format('M d, Y') }}
                                            </button>
                                            <div x-show="open" x-collapse class="px-4 py-2 bg-gray-50">
                                                <p class="text-sm">{{ $preference->user->name ?? 'Unknown User' }}</p>
                                                <p class="text-sm">Will Eat: 
                                                    <span class="{{ $preference->will_eat == 'yes' ? 'text-green-500' : 'text-red-500' }}">
                                                        {{ ucfirst($preference->will_eat) }}
                                                    </span>
                                                </p>
                                                <div class="flex space-x-2 mt-2">
                                                    <a href="{{ route('food_preferences.edit', $preference->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a> |
                                                    <form action="{{ route('food_preferences.destroy', $preference->id) }}" method="POST" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                    </form>|
                                                    <form action="{{ route('food_preferences.updateAutoPreference', $preference->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="checkbox" name="auto_meal" value="1" {{ $preference->auto_meal ? 'checked' : '' }} 
                    onchange="this.form.submit()">
            </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
