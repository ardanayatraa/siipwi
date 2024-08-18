<?php

namespace App\Http\Livewire\Stock;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StockImport;
use Livewire\WithFileUploads;
use App\Models\Stock;

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

        $importData = Excel::toArray(new StockImport, $this->file->getRealPath());

        foreach ($importData[0] as $row) {

            // Assuming the 'code' field is a unique identifier for stock
            $existingStock = Stock::where('kode', $row['kode'])->first();
            if ($existingStock) {
                session()->flash('error', "Stock with code {$row['kode']} already exists and will not be imported.");
                continue; // Skip this row if it already exists
            }

            // If the stock does not exist, import it
            Excel::import(new StockImport, $this->file->getRealPath());
        }

        $this->reset(['file', 'isOpen']);

        session()->flash('success', 'Stocks imported successfully.');

        $this->emit('refreshStockList'); // Optional: Emit event to refresh stock list if needed
        return redirect()->route('stock.index');
    }

    public function render()
    {
        return view('livewire.stock.import');
    }
}
