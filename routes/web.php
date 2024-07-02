<?php

use App\Http\Controllers\PaketInternetController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenagihanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.main');
});
// Pelanggan 
Route::resource('pelanggans', PelangganController::class);

// Paket 
Route::resource('paket_internets', PaketInternetController::class);

// Penagihan
Route::resource('penagihans', PenagihanController::class);

// pembayaran
Route::resource('pembayarans', PembayaranController::class);



