<?php

namespace App\Http\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Provider;
use App\Models\Product;
use App\Models\ProductCategory;

class Add extends Component
{
    public $transaction_code;
    public $phone_number;
    public $amount;
    public $provider_id;
    public $provider_name;
    public $product_id;
    public $product_name;
    public $category_id;
    public $category_name;
    public $status = 'pending';
    public $total_price;
    public $isOpen = false;

    public $providerQuery = '';
    public $categoryQuery = '';
    public $productQuery = '';

    protected $rules = [
        'phone_number' => 'required|string|max:20',
        'amount' => 'required|numeric|min:0',
        'provider_id' => 'required|exists:providers,id',
        'product_id' => 'required|exists:products,id',
        'category_id' => 'required|exists:product_categories,id',
        'status' => 'required|string|max:255',
        'total_price' => 'required|numeric|min:0',
    ];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function filterProviders()
    {
        return Provider::where('name', 'like', '%' . $this->providerQuery . '%')->get();
    }

    public function filterCategories()
    {
        return ProductCategory::where('name', 'like', '%' . $this->categoryQuery . '%')->get();
    }

    public function filterProducts()
    {
        return Product::where('provider_id', $this->provider_id)
                       ->where('category_id', $this->category_id)
                       ->where('name', 'like', '%' . $this->productQuery . '%')
                       ->get();
    }

    public function selectProvider($id)
    {
        $provider = Provider::find($id);
        $this->provider_id = $provider->id;
        $this->provider_name = $provider->name;

        // Reset category and product fields when provider is selected
        $this->category_id = null;
        $this->category_name = '';
        $this->product_id = null;
        $this->product_name = '';
    }

    public function selectCategory($id)
    {
        $category = ProductCategory::find($id);
        $this->category_id = $category->id;
        $this->category_name = $category->name;

        // Reset product field when category is selected
        $this->product_id = null;
        $this->product_name = '';
    }

    public function selectProduct($id)
    {
        $product = Product::with('provider', 'category')->find($id);

        $this->product_id = $product->id;
        $this->product_name = $product->name;
        $this->provider_id = $product->provider->id;
        $this->provider_name = $product->provider->name;
        $this->category_id = $product->category->id;
        $this->category_name = $product->category->name;

        $this->generateTransactionCode();
    }

    private function generateTransactionCode()
    {
        if ($this->provider_id && $this->product_id) {
            $date = now()->format('dmy');
            $providerCode = substr($this->provider_name, 0, 3);
            $uniqueCode = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);

            $this->transaction_code = "INV{$date}{$providerCode}{$uniqueCode}";
        }
    }

    public function add()
    {
        $this->validate();

        Transaction::create([
            'transaction_code' => $this->transaction_code,
            'phone_number' => $this->phone_number,
            'amount' => $this->amount,
            'provider_id' => $this->provider_id,
            'product_id' => $this->product_id,
            'category_id' => $this->category_id,
            'status' => $this->status,
            'total_price' => $this->total_price,
        ]);

        $this->reset([
            'transaction_code', 'phone_number', 'amount', 'provider_id', 'provider_name',
            'product_id', 'product_name', 'category_id', 'category_name', 'status', 'total_price', 'isOpen',
            'providerQuery', 'categoryQuery', 'productQuery'
        ]);

        session()->flash('message', 'Transaction added successfully.');
    }

    public function render()
    {
        return view('livewire.transaction.add', [
            'providers' => $this->filterProviders(),
            'categories' => $this->filterCategories(),
            'products' => $this->filterProducts(),
        ]);
    }
}
