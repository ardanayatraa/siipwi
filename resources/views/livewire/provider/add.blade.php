<div>
    <x-button wire:click="openModal">
        Add Provider
    </x-button>

    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Add Provider
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="name" value="Name" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" />
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="code" value="Code" />
                <x-input id="code" type="text" class="mt-1 block w-full" wire:model.defer="code" />
                @error('code')
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
