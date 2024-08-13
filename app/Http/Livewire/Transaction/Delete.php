<?php

namespace App\Http\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction;

class Delete extends Component
{
    public $transactionId;
    public $isOpen = false;

    protected $rules = [
        'transactionId' => 'required|exists:transactions,id',
    ];

    public function mount($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function delete()
    {
        $this->validate();

        Transaction::find($this->transactionId)->delete();

        session()->flash('message', 'Transaction deleted successfully.');

        $this->reset(['transactionId', 'isOpen']);
        return redirect()->route('order.index');
    }

    public function render()
    {
        return view('livewire.transaction.delete');
    }
}
