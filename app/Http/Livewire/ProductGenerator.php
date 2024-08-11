<?php
namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Provider;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductGenerator extends Component
{
    public function generateProducts()
    {
        $stocks = Stock::all();

        foreach ($stocks as $stock) {
            $provider = $this->matchProvider($stock->kode);
            $category = $this->matchCategory($stock->keterangan);

            if ($provider && $category) {
                Product::updateOrCreate(
                    [
                        'name' => $stock->keterangan,
                        'provider_id' => $provider->id,
                        'category_id' => $category->id,
                        'stock_id' => $stock->id,
                         'code' => $stock->kode,


                    ],
                    [
                        'id' => (string) Str::uuid(),
                        'base_price' => $stock->harga,
                        'selling_price' => null,

                        'status' => $stock->status,
                    ]
                );
                Log::info("Product created for '{$stock->keterangan}' with provider '{$provider->name}' and category '{$category->name}'");
            } else {
                Log::warning("Stock '{$stock->keterangan}' did not match any provider or category.");
            }
        }

        session()->flash('message', 'Products generated successfully!');
    }

    private function matchProvider($category)
    {
        $firstLetter = substr($category, 0, 1);
        $treeLetter = substr($category, 0, 3);

        // Determine the matching pattern
        if (in_array($firstLetter, ['X', 'V'])) {
            $pattern = 'XL/AXIS';
        } elseif (in_array($firstLetter, ['S'])) {
            $pattern = 'TELKOMSEL';
        } else {
            $pattern = $firstLetter . '%'; // Handle cases where pattern is just the first letter
        }

        $provider = Provider::where('name', 'LIKE', '%' . $pattern . '%')->first();

        if (!$provider) {
            Log::warning("No provider matched for category '{$category}'");
        }

        return $provider;
    }

    private function matchCategory($keterangan)
    {
        if (preg_match('/\d+GB/i', $keterangan)) {
            $category = ProductCategory::where('name', 'LIKE', '%Paket Data%')->first();
            Log::info("Category 'Paket Data' matched for '{$keterangan}'");
            return $category;
        } elseif (preg_match('/\d+K(\b|trf)/i', $keterangan) || preg_match('/\d+Jt/i', $keterangan) || preg_match('/spesial promo/i', $keterangan)) {
            $category = ProductCategory::where('name', 'LIKE', '%Pulsa%')->first();
            Log::info("Category 'Pulsa' matched for '{$keterangan}'");
            return $category;
        } elseif (preg_match('/menit|sesama|mnt|sepuasna|sepuasnya/i', $keterangan)) {
            $category = ProductCategory::where('name', 'LIKE', '%Paket Nelpon%')->first();
            Log::info("Category 'Paket Nelpon' matched for '{$keterangan}'");
            return $category;
        }

        Log::warning("No category matched for '{$keterangan}'");
        return null;
    }

    public function resetProducts()
    {
        Product::truncate();
        session()->flash('message', 'All products have been reset!');
    }

    public function render()
    {
        return view('livewire.product-generator');
    }
}
