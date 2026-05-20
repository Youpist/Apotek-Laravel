<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;

class LaporanController extends Controller
{
    // Laporan Mingguan
    public function mingguan()
    {
        $mulai = Carbon::now()->startOfWeek();

        $akhir = Carbon::now()->endOfWeek();

        $transaksi = Transaksi::with([
                'pelanggan',
                'user'
            ])
            ->whereBetween(
                'tanggal',
                [$mulai, $akhir]
            )
            ->get();

        $total =
            $transaksi->sum('total');

        return view(
            'laporan.mingguan',
            compact(
                'transaksi',
                'total'
            )
        );
    }

    // Laporan Bulanan
    public function bulanan()
    {
        $bulan =
            Carbon::now()->month;

        $tahun =
            Carbon::now()->year;

        $transaksi = Transaksi::with([
                'pelanggan',
                'user'
            ])
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->get();

        $total =
            $transaksi->sum('total');

        return view(
            'laporan.bulanan',
            compact(
                'transaksi',
                'total'
            )
        );
    }

    public function printMingguan()
{
    $mulai = now()->startOfWeek();

    $akhir = now()->endOfWeek();

    $transaksi = Transaksi::with([
            'pelanggan',
            'user'
        ])
        ->whereBetween(
            'tanggal',
            [$mulai, $akhir]
        )
        ->get();

    $total =
        $transaksi->sum('total');

    return view(
        'laporan.print_mingguan',
        compact(
            'transaksi',
            'total'
        )
    );
}
    public function printBulanan()
{
    $bulan = now()->month;

    $tahun = now()->year;


    $transaksi = Transaksi::with([
            'pelanggan',
            'user'
        ])
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->get();

    $total =
        $transaksi->sum('total');

    return view(
        'laporan.print_bulanan',
        compact(
            'transaksi',
            'total'
        )
    );
}
}