<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $orderCount = Transaction::all()->unique('phone_number')->count();

         return view('dashboard',compact('orderCount'));
    }
}
