<x-app-layout>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
            <h2 class="text-xl font-semibold mb-4">User Creation</h2>

                <!-- Food Schedule Creation Form -->
                <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="bg-white shadow-md rounded-lg p-6">
            
            <!-- Name -->
            <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autocomplete="off" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- User Name -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"  autocomplete="off" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
        
        <!-- Email End -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email ')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autocomplete="off" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Phone End -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone ')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"  autocomplete="off" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <!-- Room Number -->
        <div class="mt-4">
            <x-input-label for="room_number" :value="__('Room Number ')" />
            <x-text-input id="room_number" class="block mt-1 w-full" type="text" name="room_number" :value="old('room_number')"  autocomplete="off" />
            <x-input-error :messages="$errors->get('room_number')" class="mt-2" />
        </div>
        <!-- password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password ')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')"  autocomplete="off" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" id="role" class="form-select block w-full mt-1">
                @foreach ($roles as $role)
                <option value="{{ $role->id }}" 
                        @if($role->id == old('role', $defaultRole->id ?? null)) selected @endif>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('role')" class="mt-2" />
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