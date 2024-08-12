<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Carbon\Carbon;

class RevenueReport extends Component
{
    public $filterType = 'daily'; // default filter type
    public $startDate;
    public $endDate;

    public function render()
    {
        $transactions = $this->getFilteredTransactions();
        $totalProfit = $this->calculateTotalProfit($transactions);

        return view('livewire.revenue-report', [
            'transactions' => $transactions,
            'totalProfit' => $totalProfit,
        ]);
    }

    public function getFilteredTransactions()
    {
        $query = Transaction::query();

        if ($this->filterType === 'daily') {
            $query->whereDate('created_at', Carbon::today());
        } elseif ($this->filterType === 'monthly') {
            $query->whereMonth('created_at', Carbon::now()->month)
                  ->whereYear('created_at', Carbon::now()->year);
        } elseif ($this->filterType === 'yearly') {
            $query->whereYear('created_at', Carbon::now()->year);
        } elseif ($this->filterType === 'custom') {
            if ($this->startDate && $this->endDate) {
                $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
            }
        }

        return $query->get();
    }

    public function calculateTotalProfit($transactions)
    {
        return $transactions->sum(function ($transaction) {
            return $transaction->total_price - $transaction->amount;
        });
    }

    public function updateFilter($type)
    {
        $this->filterType = $type;
    }
}
