<div>
    <x-button wire:click="openModal">
        Add Product
    </x-button>

    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Add Product
        </x-slot>

        <x-slot name="content">
            <div class="mt-4" x-data="{ openProvider: false, providerQuery: '' }" @click.away="openProvider = false">
                <x-label for="provider_name" value="Provider" />
                <x-input id="provider_name" type="text" class="mt-1 block w-full" x-model="providerQuery"
                    @input.debounce.500ms="openProvider = true" placeholder="Search Provider..." />

                <div x-show="openProvider" class="absolute bg-white z-10 w-full mt-2 rounded-md shadow-lg">
                    <ul>
                        @foreach ($providers as $provider)
                            <li @click="$wire.selectProvider('{{ $provider->id }}', '{{ $provider->name }}'); providerQuery = '{{ $provider->name }}'; openProvider = false"
                                class="p-2 cursor-pointer hover:bg-gray-200">{{ $provider->name }}</li>
                        @endforeach
                    </ul>
                </div>

                @if ($provider_name)
                    <p class="mt-2">Selected Provider: {{ $provider_name }}</p>
                @endif

                @error('provider_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4" x-data="{ openCategory: false, categoryQuery: '' }" @click.away="openCategory = false">
                <x-label for="category_name" value="Category" />
                <x-input id="category_name" type="text" class="mt-1 block w-full" x-model="categoryQuery"
                    @input.debounce.500ms="openCategory = true" placeholder="Search Category..." />

                <div x-show="openCategory" class="absolute bg-white z-10 w-full mt-2 rounded-md shadow-lg">
                    <ul>
                        @foreach ($categories as $category)
                            <li @click="$wire.selectCategory('{{ $category->id }}', '{{ $category->name }}'); categoryQuery = '{{ $category->name }}'; openCategory = false"
                                class="p-2 cursor-pointer hover:bg-gray-200">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>

                @if ($category_name)
                    <p class="mt-2">Selected Category: {{ $category_name }}</p>
                @endif

                @error('category_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="name" value="Product Name" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" />
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="base_price" value="Base Price" />
                <x-input id="base_price" type="text" class="mt-1 block w-full" wire:model.defer="base_price" />
                @error('base_price')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="selling_price" value="Selling Price" />
                <x-input id="selling_price" type="text" class="mt-1 block w-full" wire:model.defer="selling_price" />
                @error('selling_price')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <div class="mt-4">
                <x-label for="status" value="Status" />
                <x-input id="status" type="text" class="mt-1 block w-full" wire:model.defer="status" />
                @error('status')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal">
                Cancel
            </x-secondary-button>

            <x-button class="ml-2" wire:click="add">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
