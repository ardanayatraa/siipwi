<div class="">
    <h1 class="text-2xl font-semibold text-gray-900">Edit Provider</h1>

    <form wire:submit.prevent="update" class="mt-6 space-y-4">
        <div>
            <x-label for="name" value="Name:" />
            <x-input id="name" type="text" wire:model.defer="name" required class="mt-1 block w-full" />
        </div>

        <div>
            <x-label for="code" value="Code:" />
            <x-input id="code" type="text" wire:model.defer="code" required class="mt-1 block w-full" />
        </div>

        <div class="flex justify-between">

            <x-button>
                Update Provider
            </x-button>
            <a href="{{ route('provider.index') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Cancel
            </a>
        </div>
    </form>


</div>
