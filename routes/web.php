<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/provider', [ProviderController::class, 'index'])->name('provider.index');
Route::get('/provider/{provider}', [ProviderController::class, 'edit'])->name('provider.edit');


Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/stock', [ProductController::class, 'stock'])->name('stock.index');
Route::get('/stock/panduan', [ProductController::class, 'panduan'])->name('panduan.index');

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');


Route::get('/category', [ProductCategoryController::class, 'index'])->name('category.index');
Route::get('/order', [OrderController::class, 'index'])->name('order.index');



Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/generate/{type}', [LaporanController::class, 'generateReport'])->name('laporan.generate');


});
