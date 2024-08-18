<?php

namespace App\Http\Livewire\ProductCategory;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class Add extends Component
{
    use LivewireAlert;
    public $name;
    public $isOpen = false;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function add()
    {
        $this->validate();

        ProductCategory::create([
            'id' => (string) Str::uuid(),
            'name' => $this->name,
        ]);

        $this->reset(['name', 'isOpen']);

        $this->alert('success', 'Product Category Added!');
        return redirect()->route('category.index');
    }

    public function render()
    {
        return view('livewire.product-category.add');
    }
}
