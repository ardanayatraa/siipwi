<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Transaction;

class MonthlyOrderChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Aggregate transaction counts per month
        $monthlyData = Transaction::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Ensure data contains 12 months, defaulting to 0 if no transactions for a month
        $data = array_map(function ($month) use ($monthlyData) {
            return $monthlyData[$month] ?? 0;
        }, range(1, 12));

        return $this->chart->lineChart()
            ->setTitle('Statistik Penjualan Bulanan')
            ->addLine('Orders', $data)
            ->setXAxis($months)
            ->setColors(['#ffc63b']);
    }
}
