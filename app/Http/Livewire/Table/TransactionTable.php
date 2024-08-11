<?php

namespace App\Http\Livewire\Table;

use App\Models\Transaction;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TransactionTable extends LivewireDatatable
{
    public function builder()
    {
        return Transaction::query();
    }

    public function columns()
    {
        return [
            Column::name('transaction_code')
                ->label('Transaction Code'),
            Column::name('phone_number')
                ->label('Phone Number'),
            Column::name('amount')
                ->label('Amount'),
            Column::name('total_price')
                ->label('Total Price'),
            Column::name('status')
                ->label('Status'),

        ];
    }
}
