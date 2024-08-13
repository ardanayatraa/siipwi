<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        return view('menu.laporan.add');
    }

    public function generateReport(Request $request, $type)
    {
        $date = $request->input('date');
        $month = $request->input('month');
        $year = $request->input('year');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if ($type === 'daily') {
            $transactions = Transaction::whereDate('created_at', $date)->get();
            $filename = 'laporan_harian_' . $date;
        } elseif ($type === 'monthly') {
            $transactions = Transaction::whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
            $filename = 'laporan_bulanan_' . $month . '_' . $year;
        } elseif ($type === 'yearly') {
            $transactions = Transaction::whereYear('created_at', $year)->get();
            $filename = 'laporan_tahunan_' . $year;
        } elseif ($type === 'custom') {
            $transactions = Transaction::whereBetween('created_at', [$startDate, $endDate])->get();
            $filename = 'laporan_custom_' . $startDate . '_to_' . $endDate;
        } else {
            abort(404, 'Report type not found.');
        }

        // Ambil semua product_id dari transaksi
        $productIds = $transactions->pluck('product_id')->unique();
        // Ambil semua produk yang relevan
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        // Menghitung total profit
        $totalProfit = $transactions->sum(function ($transaction) {
            return $transaction->total_price - $transaction->amount;
        });

        // Memproses data transaksi dan produk
        $transactionsWithProducts = $transactions->map(function ($transaction) use ($products) {
            $transaction->product = $products->get($transaction->product_id);
            return $transaction;
        });

        // Membuat PDF
        $pdf = $this->generatePdf('reports.report', [
            'transactions' => $transactionsWithProducts,
            'totalProfit' => $totalProfit,
            'type' => $type,
            'date' => $date,
            'month' => $month,
            'year' => $year,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);

        // Simpan PDF ke dalam storage
        $pdfPath = 'public/reports/' . $filename . '.pdf';
        Storage::put($pdfPath, $pdf);

        // Tampilkan preview laporan
        return view('reports.preview', ['pdfPath' => asset('storage/reports/' . $filename . '.pdf')]);
    }

    private function generatePdf($view, $data)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $html = view($view, $data)->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->output();
    }
}
