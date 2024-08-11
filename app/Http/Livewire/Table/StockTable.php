<?php

namespace App\Http\Livewire\Table;

use App\Models\Stock;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class StockTable extends LivewireDatatable
{
    public function builder()
    {
        return Stock::query();
    }

    public function columns()
    {
        return [
            Column::name('category')
                ->label('Category')->filterable(),
            Column::name('kode')
                ->label('Code')->searchable(),
            Column::name('keterangan')
                ->label('Description'),
            Column::name('harga')
                ->label('Price')->editable()
              ,
            Column::name('status')
                ->label('Status'),
            // Column::callback(['id'], function ($id) {
            //     return view('components.edit-link', ['stock' => $id]);
            // })
        ];
    }
}
