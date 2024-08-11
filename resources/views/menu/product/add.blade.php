<x-app-layout>
    @livewire('product.add')
    @livewire('stock.add')
    @livewire('stock.import')
    <livewire:product-generator />
    @livewire('table.product-table')
    @livewire('table.stock-table')


</x-app-layout>
