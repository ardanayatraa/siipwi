<?php

namespace App\Http\Livewire\Table;

use App\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UserTable extends LivewireDatatable
{
    public $model = User::class;

    public function columns()
    {
        //
    }
}