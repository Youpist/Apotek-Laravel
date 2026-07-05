<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahObat = Obat::count();
        $jumlahPelanggan = Pelanggan::count();
        $jumlahTransaksi = Transaksi::count();
        $totalStok = Obat::sum('stok');
        $penjualanHariIni = Transaksi::whereDate('created_at', Carbon::today())
    ->sum('total');
    $transaksiHariIni = Transaksi::whereDate('created_at', Carbon::today())->get();
    $obatExpired = Obat::where('expired_date', '<', Carbon::now())->get();
    $stokMenipis = Obat::where('stok', '<=', 10)->get();

        return view('dashboard', [

            'jumlahObat' => $jumlahObat,
            'jumlahPelanggan' => $jumlahPelanggan,
            'jumlahTransaksi' => $jumlahTransaksi,
            'totalStok' => $totalStok,
            'penjualanHariIni' => $penjualanHariIni,
            'transaksiHariIni' => $transaksiHariIni,
            'obatExpired' => $obatExpired,
            'stokMenipis' => $stokMenipis,
        ]);
    }
}