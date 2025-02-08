<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users List') }}
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
    @if(session('info'))
    <x-alert type="info" message="{{ session('info') }}" dismissable="false" />
    @endif
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-xl font-semibold mb-4">User List</h2>

                <!-- User List Table -->
                 <div class="overflow-x-auto">
                <table class="min-w-full text-left table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Room</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Phone</th>
                            <th class="px-4 py-2 text-left">Role</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through users (replace this with dynamic content from your backend) -->
                        @foreach($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->userInfo->room_number ?? '' }}</td>
                                <td class="border px-4 py-2">{{ $user->status }}</td>
                                <td class="border px-4 py-2">{{ $user->phone }}</td>
                                <td class="border px-4 py-2">@forelse($user->roles as $role)
        <span class="badge badge-info">{{ $role->name }}</span>
    @empty
        <span class="badge badge-secondary">No roles assigned</span>
    @endforelse</td>
                                <td class="border px-4 py-2 flex space-x-2">
                                    <!-- Show Button -->
                                    <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                     <!-- view Meals Button -->
                                     <a href="{{ route('users.view.meals', $user->id) }}" class="text-green-500 hover:text-blue-700">Meals</a>
                                    @can('user-edit', 'web') 
                                    <!-- Edit Button -->
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
</svg>
</a>
                                    @endcan 
                                    @can('user-delete', 'web')
                                    <!-- Delete Button -->
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>
</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
</div>
                <!-- Pagination (if needed) -->
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>