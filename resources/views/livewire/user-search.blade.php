<div>
    <!-- Search input -->
    <input type="text" 
          wire:model.live="searchuser" 
           class="form-input w-full mt-1" 
           placeholder="Search by Name or Email" id="user_id" autocomplete="off"/>
<!-- Hidden input to store user_id -->
<input type="hidden" name="user_id" value="{{ $selectedUserId }}" />
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
