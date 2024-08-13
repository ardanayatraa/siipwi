<?php

namespace App\Http\Livewire\Stock;

use Livewire\Component;
use App\Models\Stock;
use Illuminate\Support\Str;

class Add extends Component
{
    public $category;
    public $kode;
    public $keterangan;
    public $harga;
    public $status;
    public $isOpen = false;
    public $isResetModalOpen = false;

    protected $rules = [
        'category' => 'required|string|max:255',
        'kode' => 'required|string|max:255',
        'keterangan' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'status' => 'required|string|max:50',
    ];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function openResetModal()
    {
        $this->isResetModalOpen = true;
    }

    public function closeResetModal()
    {
        $this->isResetModalOpen = false;
    }

    public function add()
    {
        $this->validate();

        Stock::create([
            'id' => (string) Str::uuid(),
            'category' => $this->category,
            'kode' => $this->kode,
            'keterangan' => $this->keterangan,
            'harga' => $this->harga,
            'status' => $this->status,
        ]);

        $this->reset(['category', 'kode', 'keterangan', 'harga', 'status', 'isOpen']);
        return redirect()->route('stock.index');
    }

    public function resetStock()
    {
        Stock::truncate(); // Menghapus semua data stock
        $this->closeResetModal();
        session()->flash('message', 'All stocks have been reset!');
        return redirect()->route('stock.index');
    }

    public function render()
    {
        return view('livewire.stock.add');
    }
}
