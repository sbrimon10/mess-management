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
            <x-link-button href="{{ route('food_preferences.create') }}" text="Set Preference" classes="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" icon="<i class='fas fa-tachometer-alt'></i>" />

                <!-- User List Table -->
                <table class="min-w-full text-left">
                    <thead>
                        <tr>
                        @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('super-admin'))
                        <th class="px-4 py-2">Food Schedule</th> <!-- Admins see the user's name -->
        @endif
                    <th class="px-4 py-2">Food Schedule</th>
                    <th class="px-4 py-2">Will Eat</th>
                    <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($foodPreferences->isEmpty())
                            <tr>
                                <td colspan="5" class="border px-4 py-2 text-center">No food preferences found.</td>
                            </tr>
                        @endif
                        <!-- Loop through users (replace this with dynamic content from your backend) -->
                        @foreach($foodPreferences as $preference)
                            <tr>
                                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('super-admin'))
           <td class="border px-4 py-2">User: {{ $preference->user->name }}</td>   <!-- Admins see the user's name -->
        @endif
                               
                           
                                <td class="border px-4 py-2">{{ $preference->foodSchedule->meal_type }} on {{ $preference->meal_date }}</td>
                               
                                <td class="border px-4 py-2">{{ $preference->will_eat }}</td>
                                
                                <td class="border px-4 py-2 flex space-x-2">
                                <a href="{{ route('food_preferences.edit', $preference->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a> |
                            <form action="{{ route('food_preferences.destroy', [auth()->id(), $preference->id]) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
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