<div>
    @if (session()->has('message'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update" class="space-y-6">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Category Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4 space-x-4">
            <x-button class="ml-4">
                {{ __('Update Category') }}
            </x-button>

            <!-- Batal Button -->
            <a href="{{ route('category.index') }}"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                {{ __('Cancel') }}
            </a>
        </div>
    </form>
</div>
