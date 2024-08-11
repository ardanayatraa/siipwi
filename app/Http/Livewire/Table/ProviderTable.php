<?php

namespace App\Http\Livewire\Table;

use App\Models\Provider;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ProviderTable extends LivewireDatatable
{
    public function builder()
    {
        return Provider::query();
    }

    public function columns()
    {
        return[


              Column::name('name')
                ->label('Provider Name'),
               Column::name('code')
                ->label('Code'),
             Column::callback(['id'], function ($id) {
                     return view('components.edit-link', ['provider' => $id]);
                  })



        ];
    }
}
