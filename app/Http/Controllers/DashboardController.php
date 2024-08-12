<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyOrderChart;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(MonthlyOrderChart $chart)
    {
        $clientCount = Transaction::distinct('phone_number')->count('phone_number');
        $orderCount = Transaction::count();

        $keuntungan = Transaction::all()->sum(function ($transaction) {
            return $transaction->total_price - $transaction->amount;
        });

        $keuntunganHariIni = Transaction::whereDate('created_at', now()->toDateString())
        ->get()
        ->sum(function ($transaction) {
            return $transaction->total_price - $transaction->amount;
        });

        // Number of orders today
        $ordersHariIni = Transaction::whereDate('created_at', now()->toDateString())->count();

        return view('dashboard', [
            'chart' => $chart->build(),
            'clientCount' => $clientCount,
            'untung' => $keuntungan,
            'orderCount' => $orderCount,
            'keuntunganHariIni' => $keuntunganHariIni,
            'ordersHariIni' => $ordersHariIni, // Pass this to the view
        ]);
    }
}
