<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyOrderChart;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(MonthlyOrderChart $chart){

        $orderCount = Transaction::all()->unique('phone_number')->count();

         return view('dashboard', ['chart' => $chart->build(),'orderCount'=>$orderCount]);
    }
}
