<?php

namespace App\Http\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Provider;
use App\Models\Product;
use App\Models\ProductCategory;

class Edit extends Component
{
    public $transaction_id;
    public $transaction_code;
    public $phone_number;
    public $amount;
    public $provider_id;
    public $provider_name;
    public $product_id;
    public $product_name;
    public $category_id;
    public $category_name;
    public $status;
    public $total_price;

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

    public function mount($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        $product = Product::find($transaction->product_id);

        $this->transaction_id = $transaction->id;
        $this->transaction_code = $transaction->transaction_code;
        $this->phone_number = $transaction->phone_number;
        $this->amount = $transaction->amount;
        $this->provider_id = $transaction->provider_id;
        $this->provider_name = $transaction->provider->name;
        $this->product_id = $product->id;
        $this->product_name = $product->name;
        $this->category_id = $transaction->category_id;
        $this->category_name = $transaction->category->name;
        $this->status = $transaction->status;
        $this->total_price = $transaction->total_price;
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
        $this->amount = $product->base_price;
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

            // Hitung jumlah transaksi untuk hari ini
            $orderCount = Transaction::whereDate('created_at', now()->format('Y-m-d'))->count() + 1;

            // Format order number menjadi tiga digit
            $uniqueCode = str_pad($orderCount, 3, '0', STR_PAD_LEFT);

            $this->transaction_code = "INV{$date}{$providerCode}{$uniqueCode}";
        }
    }

    public function update()
    {
        $this->validate();

        $transaction = Transaction::find($this->transaction_id);
        $transaction->update([
            'transaction_code' => $this->transaction_code,
            'phone_number' => $this->phone_number,
            'amount' => $this->amount,
            'provider_id' => $this->provider_id,
            'product_id' => $this->product_id,
            'category_id' => $this->category_id,
            'status' => $this->status,
            'total_price' => $this->total_price,
        ]);

        session()->flash('message', 'Transaction updated successfully.');
        return redirect()->route('order.index');
    }

    public function render()
    {
        return view('livewire.transaction.edit', [
            'providers' => $this->filterProviders(),
            'categories' => $this->filterCategories(),
            'products' => $this->filterProducts(),
        ]);
    }
}
