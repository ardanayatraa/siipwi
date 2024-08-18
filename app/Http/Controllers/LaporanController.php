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
        $monthYear = $request->input('month');
        $year = $request->input('year');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        switch ($type) {
            case 'daily':
                $transactions = Transaction::whereDate('created_at', $date)->get();
                $filename = 'laporan_harian_' . $date;
                break;
            case 'monthly':
                $transactions = Transaction::whereMonth('created_at', date('m', strtotime($monthYear)))
                                           ->whereYear('created_at', date('Y', strtotime($monthYear)))
                                           ->get();
                $filename = 'laporan_bulanan_' . date('m_Y', strtotime($monthYear));
                break;
            case 'yearly':
                $transactions = Transaction::whereYear('created_at', $year)->get();
                $filename = 'laporan_tahunan_' . $year;
                break;
            case 'custom':
                // Mengatur startDate dan endDate agar mencakup hari penuh
                $startDate = date('Y-m-d 00:00:00', strtotime($startDate));
                $endDate = date('Y-m-d 23:59:59', strtotime($endDate));

                $transactions = Transaction::whereBetween('created_at', [$startDate, $endDate])->get();
                $filename = 'laporan_custom_' . date('Y-m-d', strtotime($startDate)) . '_to_' . date('Y-m-d', strtotime($endDate));
                break;
            default:
                abort(404, 'Report type not found.');
        }

        $productIds = $transactions->pluck('product_id')->unique();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        $totalProfit = $transactions->sum(function ($transaction) {
            return $transaction->total_price - $transaction->amount;
        });

        $transactionsWithProducts = $transactions->map(function ($transaction) use ($products) {
            $transaction->product = $products->get($transaction->product_id);
            return $transaction;
        });

        $pdf = $this->generatePdf('reports.report', [
            'transactions' => $transactionsWithProducts,
            'totalProfit' => $totalProfit,
            'type' => $type,
            'date' => $date,
            'month' => $monthYear,
            'year' => $year,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);

        // Simpan PDF di direktori public/reports
        $pdfPath = 'reports/' . $filename . '.pdf';
        $fullPdfPath = public_path($pdfPath);
        file_put_contents($fullPdfPath, $pdf);

        // Tampilkan pratinjau laporan
        return view('reports.preview', ['pdfPath' => asset($pdfPath)]);
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
