<div>
    <!-- Search input -->
    <input type="text" 
          wire:model.live="searchuser" 
          class="form-input w-full mt-1" 
          placeholder="Search by Name or Email" />

    <!-- Display selected users -->
    <div class="mt-2">
        @foreach($selectedUsers as $selectedUser)
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 mr-2 mt-2">
                {{ $selectedUser['name'] }}
                <button type="button" wire:click="removeUser({{ $selectedUser['id'] }})" class="ml-2 text-red-500">&times;</button>
            </span>
        @endforeach
    </div>

    <!-- Hidden input to store selected user IDs -->
    <input type="hidden" name="user_ids" value="{{ implode(',', array_column($selectedUsers, 'id')) }}" />

    <!-- Display search results -->
    @if($searchuser && count($users) > 0)
        <ul class="mt-2">
            @foreach($users as $user)
                <li class="cursor-pointer hover:bg-gray-200 p-2" wire:click="selectUser({{ $user->id }}, '{{ $user->name }}')">
                    {{ $user->name }} ({{ $user->email }})
                </li>
            @endforeach
        </ul>
    @endif
</div>
