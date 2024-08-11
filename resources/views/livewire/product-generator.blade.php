<div>
    <button wire:click="generateProducts" class="bg-green-500 text-white py-2 px-4 rounded">Generate Products</button>
    <button wire:click="resetProducts" class="bg-red-500 text-white py-2 px-4 rounded">Reset Products</button>

    @if (session()->has('message'))
        <div class="mt-2 text-green-600">{{ session('message') }}</div>
    @endif
</div>
