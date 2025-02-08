

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <!-- Flash Message -->
    
    @if(session('success'))
    <x-alert type="success" message="{{ session('success') }}" dismissable="true" />
    @endif
    @if(session('error'))
    <x-alert type="error" message="{{ session('error') }}" dismissable="true" />
    @endif 
    

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
<button wire:click="openFormModal" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create New Category</button>
<input type="text" id="categorySearch" 
          wire:model.live="search" 
          class="form-input w-full mt-1" 
          placeholder="Search by Name " />
          <div wire:loading wire:target="search"> 
          <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin h-10 w-10 text-blue-500" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                <path fill="none" d="M11 6H5a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V9a3 3 0 00-3-3h-6"></path>
            </svg>
    </div>
<!-- Filter Dropdown -->
<div class="mb-3">
        <select wire:model.live="filter" class="form-select" name="categoryFilter">
            <option value="">Select Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
            <div class="overflow-x-auto">
                <!-- User List Table -->
                <table class="min-w-full text-left table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">status</th>
                            <th class="px-4 py-2 text-left">Created by</th>
                            <th class="px-4 py-2 text-left"> Date</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories->isEmpty())
                            <tr>
                                <td colspan="5" class="border px-4 py-2 text-center">No Categories found.</td>
                            </tr>
                        @endif
                        <!-- Loop through users (replace this with dynamic content from your backend) -->
                        @foreach($categories as $category)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $category->name }}</td>
                                <td class="border px-4 py-2">{{ $category->status }}</td>
                                <td class="border px-4 py-2">@if($category->users->isNotEmpty())
                        {{ $category->users->first()->name }}  <!-- Display the name of the first user (the creator) -->
                    @else
                        Unknown
                    @endif</td>
                                <td class="border px-4 py-2">{{ $category->created_at }}</td>
                                <td class="border px-4 py-2 flex space-x-2">
                                    <!-- Edit Button -->
                                    <button wire:click="editCategory({{ $category->id }})" class="px-2 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">Edit</button>
                        <button wire:click="deleteCategory({{ $category->id }})" class="ml-2 px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                        
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
                <!-- Pagination (if needed) -->
                <div class="mt-4">
                    {{ $categories->links() }}
                </div>

<!-- Category Form Modal -->
@if($isFormModalOpen)

<div x-data="{ open: @entangle('isFormModalOpen') }">
    <!-- Main Modal -->
    <div x-show="open" x-transition @keydown.escape.window="open = false" class="fixed inset-0 z-50 flex justify-center items-center">
        <!-- Overlay background -->
        <div class="absolute inset-0 bg-black opacity-50" @click="open = false"></div>

        <!-- Modal content -->
        <div class="relative p-4 w-full max-w-2xl max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="relative">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $isUpdateMode ? 'Edit' : 'Add New' }} Category
                    </h3>
                    <button @click="open = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form wire:submit.prevent="{{ $isUpdateMode ? 'updateCategory' : 'createCategory' }}">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                            <input type="text" id="name" wire:model="name" class="form-input mt-1 block w-full" placeholder="Enter Category Name" required>
                            @error('name') 
                                <span class="text-red-500 text-sm">{{ $message }}</span> 
                            @enderror
                        </div>
                        <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input wire:model="description" id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"  autocomplete="off" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <!-- Save Button -->
                    <button 
                        wire:click="{{ $isUpdateMode ? 'updateCategory' : 'createCategory' }}" wire:loading.attr="disabled"
                        type="button" 
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        :disabled="!@entangle('name')"> <!-- Disable button if name is empty -->
                        {{ $isUpdateMode ? 'Update' : 'Save' }}
                    </button>

                    <!-- Cancel Button -->
                    <button @click="open = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


@endif


    

    <!-- Delete Confirmation Modal -->
@if($isDeleteModalOpen)
    <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
        <div class="bg-white rounded p-6 max-w-sm w-full">
            <h3 class="text-lg font-semibold">Are you sure you want to delete this category?</h3>
            <div class="mt-4 flex justify-end space-x-4">
                <button wire:click="closeDeleteModal" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</button>
                <button wire:click="confirmDelete" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Confirm</button>
            </div>
        </div>
    </div>
@endif



            </div>
        </div>
    </div>
</div>
 