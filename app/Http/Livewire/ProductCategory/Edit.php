<?php

namespace App\Http\Livewire\ProductCategory;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\ProductCategory;

class Edit extends Component
{
    use LivewireAlert;
    public $categoryId;
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount($id)
    {
        $category = ProductCategory::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
    }

    public function update()
    {
        $this->validate();

        $category = ProductCategory::findOrFail($this->categoryId);
        $category->update([
            'name' => $this->name,
        ]);
        $this->alert('success', 'Product Category Updated !');
        return redirect()->route('category.index');
    }

    public function render()
    {
        return view('livewire.product-category.edit');
    }
}
