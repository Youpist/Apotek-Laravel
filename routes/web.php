<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PelangganController;

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
    return redirect('/login');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function(){

    // DASHBOARD
    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');

    // TRANSAKSI
    Route::get(
        '/transaksi',
        [TransaksiController::class, 'index']
    )->name('transaksi.index');

    Route::get(
        '/transaksi/create',
        [TransaksiController::class, 'create']
    )->name('transaksi.create');

    Route::post(
        '/transaksi/store',
        [TransaksiController::class, 'store']
    )->name('transaksi.store');

    Route::get(
        '/transaksi/{id}/struk',
        [TransaksiController::class, 'struk']
    )->name('transaksi.struk');

    // PELANGGAN
    Route::resource(
        'pelanggan',
        PelangganController::class
    );

    // LAPORAN
    Route::get('/laporan/mingguan', [LaporanController::class, 'mingguan'] )->name('laporan.mingguan');

    Route::get('/laporan/bulanan',[LaporanController::class, 'bulanan'])->name('laporan.bulanan');

    // PRINT LAPORAN
    Route::get('/laporan/mingguan/print', [LaporanController::class, 'printMingguan'])->name('laporan.mingguan.print');
    Route::get('/laporan/bulanan/print', [LaporanController::class, 'printBulanan'])->name('laporan.bulanan.print');

    // USER
    Route::resource('users', UserController::class);
    
    // OBAT
    Route::resource('obat',ObatController::class);


});
