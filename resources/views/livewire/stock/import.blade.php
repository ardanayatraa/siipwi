<div>
    <x-button wire:click="openModal">
        Import Stock
    </x-button>

    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Import Stock Data
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="import" enctype="multipart/form-data">
                <div class="mt-4">
                    <x-label for="file" value="Upload Excel File" />
                    <x-input id="file" type="file" class="mt-1 block w-full" wire:model="file" />
                    @error('file')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-button type="submit">
                        Import
                    </x-button>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal">
                Cancel
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
