<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::resource('obat', \App\Http\Controllers\ObatController::class)
    ->middleware('auth');

Route::resource('distributor', \App\Http\Controllers\DistributorController::class)
    ->middleware('auth');

Route::resource('pembelian', \App\Http\Controllers\PembelianController::class)
    ->middleware('auth');

Route::resource('detail_pembelian', \App\Http\Controllers\Detail_PembelianController::class)
    ->middleware('auth');

Route::resource('penjualan', \App\Http\Controllers\PenjualanController::class)
    ->middleware('auth');

Route::resource('detail_penjualan', \App\Http\Controllers\Detail_PenjualanController::class)
    ->middleware('auth');

Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'Laporan'])->name('laporan');
Route::get('/download-laporan-pdf', [App\Http\Controllers\LaporanController::class, 'downloadpdf']);

Route::get('/generate_laporan', [App\Http\Controllers\Generate_LaporanController::class, 'Generate_Laporan'])->name('generate_laporan');
Route::get('/download-generate_laporan-pdf', [App\Http\Controllers\Generate_LaporanController::class, 'downloadpdf']);