<div>
    <x-button wire:click="openModal">
        Add Stock
    </x-button>

    <x-button wire:click="openResetModal" class="ml-4 bg-red-600 hover:bg-red-700">
        Reset Stock
    </x-button>

    <!-- Modal untuk Menambah Stock -->
    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Add Stock
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="category" value="Category" />
                <x-input id="category" type="text" class="mt-1 block w-full" wire:model.defer="category" />
                @error('category')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="kode" value="Code" />
                <x-input id="kode" type="text" class="mt-1 block w-full" wire:model.defer="kode" />
                @error('kode')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="keterangan" value="Description" />
                <x-input id="keterangan" type="text" class="mt-1 block w-full" wire:model.defer="keterangan" />
                @error('keterangan')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="harga" value="Price" />
                <x-input id="harga" type="text" class="mt-1 block w-full" wire:model.defer="harga" />
                @error('harga')
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

    <!-- Modal Konfirmasi Reset Stock -->
    <x-dialog-modal wire:model="isResetModalOpen">
        <x-slot name="title">
            Confirm Reset
        </x-slot>

        <x-slot name="content">
            Are you sure you want to reset all stock data? This action cannot be undone.
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeResetModal">
                Cancel
            </x-secondary-button>

            <x-button class="ml-2 bg-red-600 hover:bg-red-700" wire:click="resetStock">
                Reset
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
