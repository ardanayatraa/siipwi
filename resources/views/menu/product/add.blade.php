<x-app-layout>
    <div class="flex gap-1">
        @livewire('product.add')
        <livewire:product-generator />
    </div>
    <br>
    @livewire('table.product-table')
</x-app-layout>
