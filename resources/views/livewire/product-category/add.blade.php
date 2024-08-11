<div>
    <x-button wire:click="openModal">
        Add Product Category
    </x-button>

    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Add Product Category
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="name" value="Name" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" />
                @error('name')
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
