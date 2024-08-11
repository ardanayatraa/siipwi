<?php

namespace App\Imports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class StockImport implements ToModel, WithHeadingRow
{
    /**
     * Transform the price value to remove currency symbols and commas, keeping only numeric values.
     *
     * @param string $price
     * @return float
     */
    private function formatPrice($price)
    {
        // Remove currency symbols and commas
        $price = preg_replace('/[^\d]/', '', $price);

        // Convert to float and return as integer
        return (float) $price;
    }

    public function model(array $row)
    {
        return new Stock([
            'id' => (string) Str::uuid(),
            'category' => $row['category'],
            'kode' => $row['kode'],
            'keterangan' => $row['keterangan'],
            'harga' => $this->formatPrice($row['harga']),
            'status' => $row['status'],
        ]);
    }
}
