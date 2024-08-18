<x-app-layout>

    <div class="flex gap-1">
        @livewire('stock.add')
        @livewire('stock.import')
        <span
            class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10 ml-auto">
            <a href="{{ route('stock.panduan') }}" class="flex items-center space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <span>Panduan Import Stock</span>
            </a>
        </span>

    </div>

    <br>


    <livewire:table.stock-table exportable />
</x-app-layout>
