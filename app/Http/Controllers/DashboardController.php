<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pelanggan;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahObat = Obat::count();
        $jumlahPelanggan = Pelanggan::count();
        $jumlahTransaksi = Transaksi::count();
        $totalStok = Obat::sum('stok');

        return view('dashboard', [

            'jumlahObat' => $jumlahObat,
            'jumlahPelanggan' => $jumlahPelanggan,
            'jumlahTransaksi' => $jumlahTransaksi,
            'totalStok' => $totalStok
        ]);
    }
}