<?php

namespace App\Http\Livewire\Table;

use App\Models\ProductCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ProductCategoryTable extends LivewireDatatable
{
    public function builder()
    {
        return ProductCategory::query();
    }

    public function columns()
    {
        return [
            Column::name('name')
                ->label('Category Name'),

        ];
    }
}
