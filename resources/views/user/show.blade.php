<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users List') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                

        <h1 class="text-2xl font-semibold text-gray-800 mb-6">User Details</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- User Info -->
            <div class="space-y-4">
                <div class="flex items-center space-x-4">
                    <span class="font-medium text-gray-700">Name:</span>
                    <span class="text-gray-600">{{ $user->name }}</span>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="font-medium text-gray-700">Username:</span>
                    <span class="text-gray-600">{{ $user->username }}</span>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="font-medium text-gray-700">Email:</span>
                    <span class="text-gray-600">{{ $user->email }}</span>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="font-medium text-gray-700">Phone:</span>
                    <span class="text-gray-600">{{ $user->phone ?? 'N/A' }}</span>
                </div>
            </div>

            <!-- Roles and Permissions -->
            <div class="space-y-4">
                <div class="flex items-center space-x-4">
                    <span class="font-medium text-gray-700">Roles:</span>
                    <div class="flex flex-wrap gap-2">
                        @if($roles)
                            <span class="px-3 py-1 bg-blue-500 text-gray-600 rounded-full text-sm">{{ $roles[0] }}</span>
                        @else
                            <span class="text-gray-600">No roles assigned</span>
                        @endif
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="font-medium text-gray-700">Permissions:</span>
                    <div class="space-y-2">
                        @forelse($permissions as $permission)
                            <p class="px-3 py-1 bg-green-500 text-white text-sm">{{ $permission->name }}</p>
                        @empty
                            <span class="text-gray-600">No permissions assigned</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">Back to users list</a>
        </div>
    
            </div>
        </div>
    </div>
</div>

</x-app-layout>