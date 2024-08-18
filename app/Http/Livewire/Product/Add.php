<?php
namespace App\Http\Livewire\Product;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\Product;
use App\Models\Provider;
use App\Models\ProductCategory;

class Add extends Component
{
    use LivewireAlert;
    public $provider_id;
    public $provider_name;
    public $category_id;
    public $category_name;
    public $name;
    public $base_price;
    public $selling_price;
    public $stock;
    public $status = 'pending';
    public $isOpen = false;

    protected $rules = [
        'provider_id' => 'required|exists:providers,id',
        'category_id' => 'required|exists:product_categories,id',
        'name' => 'required|string|max:255',
        'base_price' => 'required|numeric|min:0',
        'selling_price' => 'required|numeric|min:0',
        'status' => 'required|string|max:255',
    ];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function selectProvider($id, $name)
    {
        $this->provider_id = $id;
        $this->provider_name = $name;
    }

    public function selectCategory($id, $name)
    {
        $this->category_id = $id;
        $this->category_name = $name;
    }

    public function add()
    {
        $this->validate();

        Product::create([
            'provider_id' => $this->provider_id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'base_price' => $this->base_price,
            'selling_price' => $this->selling_price,
            'status' => $this->status,
        ]);

        $this->reset(['provider_id', 'provider_name', 'category_id', 'category_name', 'name', 'base_price', 'selling_price', 'stock', 'status', 'isOpen']);
        $this->alert('success', 'Product Added ! ');
           return redirect()->route('product.index');
    }

    public function render()
    {
        return view('livewire.product.add', [
            'providers' => Provider::all(),
            'categories' => ProductCategory::all(),
        ]);
    }
}
