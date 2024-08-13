<div>
    <!-- Transaction Code -->
    <div class="mt-4 hidden">
        <x-label for="transaction_code" value="Transaction Code" />
        <x-input id="transaction_code" type="text" class="mt-1 block w-full" wire:model.defer="transaction_code"
            readonly />
        @error('transaction_code')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <!-- Status -->
    <div class="mt-4">
        <x-label for="status" value="Status" />
        <div class="relative mt-1">
            <select id="status"
                class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
                wire:model.defer="status">
                <option value="pending">Pending</option>
                <option value="success">Success</option>
            </select>

        </div>
        @error('status')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>


    <!-- Provider Search -->
    <div x-data="{ openProvider: false }" @click.away="openProvider = false" class="relative mt-4">
        <x-label for="provider_name" value="Provider" />
        <x-input id="provider_name" type="text" class="mt-1 block w-full" wire:model.debounce.500ms="providerQuery"
            @focus="openProvider = true" placeholder="Search Provider..." />

        <div x-show="openProvider"
            class="absolute bg-white z-10 w-full mt-2 rounded-md shadow-lg max-h-60 overflow-y-auto">
            <ul>
                @forelse ($providers as $provider)
                    <li @click="$wire.selectProvider('{{ $provider->id }}'); openProvider = false"
                        class="p-2 cursor-pointer hover:bg-gray-200">{{ $provider->name }}</li>
                @empty
                    <li class="p-2">No providers found</li>
                @endforelse
            </ul>
        </div>

        @if ($provider_name)
            <x-input disabled type="text" value="{{ $provider_name }}"
                class="mt-1 border-2 border-purple-500 block w-full" />
        @endif

        @error('provider_id')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <!-- Category Search -->
    <div x-data="{ openCategory: false }" @click.away="openCategory = false" class="relative mt-4">
        <x-label for="category_name" value="Category" />
        <x-input id="category_name" type="text" class="mt-1 block w-full" wire:model.debounce.500ms="categoryQuery"
            @focus="openCategory = true" placeholder="Search Category..." />

        <div x-show="openCategory"
            class="absolute bg-white z-10 w-full mt-2 rounded-md shadow-lg max-h-60 overflow-y-auto">
            <ul>
                @forelse ($categories as $category)
                    <li @click="$wire.selectCategory('{{ $category->id }}'); openCategory = false"
                        class="p-2 cursor-pointer hover:bg-gray-200">{{ $category->name }}</li>
                @empty
                    <li class="p-2">No categories found</li>
                @endforelse
            </ul>
        </div>

        @if ($category_name)
            <x-input disabled type="text" value=" {{ $category_name }}"
                class="mt-1 border-2 border-purple-500 block w-full" />
        @endif

        @error('category_id')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <!-- Product Search -->
    <div x-data="{ openProduct: false }" @click.away="openProduct = false" class="relative mt-4">
        <x-label for="product_name" value="Product" />
        <x-input id="product_name" type="text" class="mt-1 block w-full" wire:model.debounce.500ms="productQuery"
            @focus="openProduct = true" placeholder="Search Product..." />

        <div x-show="openProduct"
            class="absolute bg-white z-10 w-full mt-2 rounded-md shadow-lg max-h-60 overflow-y-auto">
            <ul>
                @forelse ($products as $product)
                    <li @click="$wire.selectProduct('{{ $product->id }}'); openProduct = false"
                        class="p-2 cursor-pointer hover:bg-gray-200">{{ $product->name }}</li>
                @empty
                    <li class="p-2">No products found</li>
                @endforelse
            </ul>
        </div>

        @if ($product_name)
            <x-input disabled type="text" value="{{ $product_name }}"
                class="mt-1 border-2 border-purple-500 block w-full" />
        @endif

        @error('product_id')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <!-- Phone Number -->
    <div class="mt-4">
        <x-label for="phone_number" value="Phone Number" />
        <x-input id="phone_number" type="text" class="mt-1 block w-full" wire:model.defer="phone_number" />
        @error('phone_number')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <!-- Amount -->
    <div class="mt-4">
        <x-label for="amount" value="Amount" />
        <x-input id="amount" type="number" class="mt-1 block w-full" wire:model.defer="amount" />
        @error('amount')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>


    <!-- Total Price -->
    <div class="mt-4">
        <x-label for="total_price" value="Total Price" />
        <x-input id="total_price" type="number" class="mt-1 block w-full" wire:model.defer="total_price" />
        @error('total_price')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-6">
        <x-button wire:click="update" class="bg-purple-500">Update Transaction</x-button>
        @if (session()->has('message'))
            <span class="text-green-500 ml-2">{{ session('message') }}</span>
        @endif
    </div>
</div>
