<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold mb-4">Create Deposit</h2>

                    <!-- Deposit Creation Form -->
                    <form action="{{ route('deposits.store') }}" method="POST">
                        @csrf

                        <div class="bg-white shadow-md rounded-lg p-6">
                            <!-- Amount -->
                            <div class="mt-4">
                                <x-input-label for="amount" :value="__('Amount')" />
                                <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" step="0.01" min="0" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                            </div>

                            <!-- Month -->
                            <div class="mt-4">
                                <x-input-label for="month" :value="__('Month')" />
                                <select id="month" name="month" class="block mt-1 w-full">
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}" @if(old('month') == $month) selected @endif>
                                            {{ \Carbon\Carbon::create()->month($month)->format('F') }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('month')" class="mt-2" />
                            </div>

                            <!-- Year -->
                            <div class="mt-4">
                                <x-input-label for="year" :value="__('Year')" />
                                <select id="year" name="year" class="block mt-1 w-full">
                                    @foreach (range(date('Y'), date('Y') + 5) as $year)
                                        <option value="{{ $year }}" @if(old('year') == $year) selected @endif>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('year')" class="mt-2" />
                            </div>

                            <!-- Payment Method -->
                            <div class="mt-4">
                                <x-input-label for="payment_method" :value="__('Payment Method')" />
                                <x-text-input id="payment_method" class="block mt-1 w-full" type="text" name="payment_method" :value="old('payment_method')" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('payment_method')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-primary-button>
                                    {{ __('Submit Deposit') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
