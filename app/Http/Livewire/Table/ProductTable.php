<?php


namespace App\Http\Livewire\Table;

use App\Models\Product;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ProductTable extends LivewireDatatable
{
    public function builder()
    {
        return Product::query()
            ->with(['provider', 'category']); // Load relationships
    }

    public function columns()
    {
        return [
            // Column::name('provider.name')
            //     ->label('Provider')
            //     ,

            // Column::name('category.name')
            //     ->label('Category')
            //     ,

            Column::name('name')
                ->label('Product Name')
         ,
            Column::name('code')
                ->label('Code')
                ->searchable(),

            NumberColumn::name('base_price')
                ->label('Base Price'),


            Column::name('status')
                ->label('Status'),
        ];
    }
}
