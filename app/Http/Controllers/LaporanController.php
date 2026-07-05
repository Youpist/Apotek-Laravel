<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Laporan Mingguan
    public function mingguan(Request $request)
{
    $query = Transaksi::with(['pelanggan','user']);

    if($request->filled('awal') && $request->filled('akhir')){
        $query->whereBetween('tanggal',[
            $request->awal,
            $request->akhir
        ]);
    }else{
        $query->whereBetween('tanggal',[
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }

    $transaksi = $query->get();

    $total = $transaksi->sum('total');

    return view('laporan.mingguan',compact(
        'transaksi',
        'total'
    ));
}


    // Laporan Bulanan
    public function bulanan(Request $request)
{
    $bulan = $request->bulan ?? now()->month;
    $tahun = $request->tahun ?? now()->year;

    $transaksi = Transaksi::with(['pelanggan','user'])
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->orderBy('tanggal','desc')
        ->get();

    $total = $transaksi->sum('total');

    return view('laporan.bulanan', compact(
        'transaksi',
        'total',
        'bulan',
        'tahun'
    ));
}

    public function printMingguan(Request $request)
{
    $awal = $request->awal;
    $akhir = $request->akhir;

    $transaksi = Transaksi::with(['pelanggan','user']);

    if($awal && $akhir){
        $transaksi->whereBetween('tanggal', [$awal, $akhir]);
    }

    $transaksi = $transaksi->get();

    $total = $transaksi->sum('total');

    return view('laporan.print_mingguan', compact(
        'transaksi',
        'total',
        'awal',
        'akhir'
    ));
}
    public function printBulanan(Request $request)
{
    $bulan = $request->bulan ?? now()->month;
    $tahun = $request->tahun ?? now()->year;
    
    $transaksi = Transaksi::with(['pelanggan','user'])
    ->whereMonth('tanggal', $bulan)
    ->whereYear('tanggal', $tahun)
    ->orderBy('tanggal','desc')
    ->get();
    $total = $transaksi->sum('total');
    
    return view('laporan.print_bulanan', compact(
        'transaksi',
        'bulan',
        'tahun',
        'total'
    ));
}
}
