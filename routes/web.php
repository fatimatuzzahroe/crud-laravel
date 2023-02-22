<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master', [MasterController::class, 'index'])->name('master');
Route::get('/master/cabang', [MasterController::class, 'cabang'])->name('master-cabang');
Route::get('/master/cabang/tambah', [MasterController::class, 'cabang_tambah'])->name('master-cabang-tambah');
Route::post('/master/cabang/simpan', [MasterController::class, 'cabang_simpan'])->name('master-cabang-simpan');
Route::get('/master/cabang/edit/{kode}', [MasterController::class, 'cabang_edit'])->where('kode', '[A-Za-z]+')->name('master-cabang-edit');
Route::post('/master/cabang/update/{kode}', [MasterController::class, 'cabang_update'])->where('kode', '[A-Za-z]+')->name('master-cabang-update');
Route::get('/master/menuresto', [MasterController::class, 'menuresto'])->name('master-menuresto');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/transaksi/sales', [TransaksiController::class, 'sales'])->name('transaksi-sales');
Route::post('/transaksi/sales/jual', [TransaksiController::class, 'sales_jual'])->name('transaksi-sales-jual');

Route::get('/transaksi/stock', [TransaksiController::class, 'stock'])->name('transaksi-stock');
Route::get('/transaksi/stock/tambah', [TransaksiController::class, 'stock_tambah'])->name('transaksi-stock-tambah');

Route::post('/transaksi/stock/simpan', [TransaksiController::class, 'stock_simpan'])->name('transaksi-stock-simpan');