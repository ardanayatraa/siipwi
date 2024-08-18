<?php

namespace App\Http\Livewire\ProductCategory;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\ProductCategory;

class Delete extends Component
{
    use LivewireAlert;
    public $categoryId;
    public $category;
    public $isOpen = false;

    public function mount($categoryId)
    {
        $this->categoryId = $categoryId;
        $this->category = ProductCategory::find($this->categoryId);
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
        ProductCategory::find($this->categoryId)->delete();

        $this->reset(['categoryId', 'category', 'isOpen']);
        $this->alert('success', 'Product Category Deleted !');
        return redirect()->route('category.index');
    }

    public function render()
    {
        return view('livewire.product-category.delete');
    }
}
