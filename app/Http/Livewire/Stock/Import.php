<?php

namespace App\Http\Livewire\Stock;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StockImport;
use Livewire\WithFileUploads;

class Import extends Component
{
    use WithFileUploads;

    public $file;
    public $isOpen = false;

    protected $rules = [
        'file' => 'required|file|mimes:xlsx,csv',
    ];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset('file');
    }

    public function import()
    {
        $this->validate();

        Excel::import(new StockImport, $this->file->getRealPath());

        $this->reset(['file', 'isOpen']);

        session()->flash('success', 'Stocks imported successfully.');
        $this->emit('refreshStockList'); // Optional: Emit event to refresh stock list if needed
    }

    public function render()
    {
        return view('livewire.stock.import');
    }
}
