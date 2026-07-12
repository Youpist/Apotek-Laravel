<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\DetailTransaksi;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $transaksi = Transaksi::with([
            'pelanggan',
            'user'
        ])
            ->whereHas('pelanggan', function ($query) use ($keyword) {
                $query->where('nama', 'like', "%$keyword%");
            })
            ->orWhereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%");
            })
            ->orWhere('tanggal', 'like', "%$keyword%")
            ->orWhere('total', 'like', "%$keyword%")
            ->latest()
            ->paginate(10);

            return view('transaksi.index', compact('transaksi', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $obat = Obat::all();
        return view('transaksi.create', compact('pelanggan', 'obat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $total = 0;

    foreach($request->obat_id as $key => $obatId)
    {
        $obat = Obat::find($obatId);
        $jumlah = $request->jumlah[$key];

       if($jumlah > $obat->stok){
        
       return redirect()->back()
       ->withInput()->with('error', 'Stok obat ' . $obat->nama_obat . ' tidak mencukupi. Stok tersedia: ' . $obat->stok);
       }

       if($jumlah <= 0) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Jumlah obat ' . $obat->nama_obat . ' harus lebih besar dari 0.');
    }
    }

    $transaksi = Transaksi::create([
        'pelanggan_id' => $request->pelanggan_id,
        'user_id' => auth()->id(),
        'tanggal' => now(),
        'total' => 0
    ]);

    foreach($request->obat_id as $key => $obatId)
    {
        $obat = Obat::find($obatId);

        $jumlah =
            $request->jumlah[$key];

        $subtotal =
            $obat->harga * $jumlah;

        DetailTransaksi::create([
            'transaksi_id' => $transaksi->id,
            'obat_id' => $obatId,
            'jumlah' => $jumlah,
            'harga' => $obat->harga,
            'subtotal' => $subtotal
        ]);

        $obat->stok -= $jumlah;

        $obat->save();

        $total += $subtotal;
    }

    $transaksi->update([
        'total' => $total
    ]);

    return redirect()
        ->route('transaksi.index')
        ->with(
            'success',
            'Transaksi berhasil.'
        );
}

    public function struk(int $id)
{
    $transaksi = Transaksi::with([
        'pelanggan',
        'user',
        'detail.obat'
    ])->findOrFail($id);

    return view(
        'transaksi.struk',
        compact('transaksi')
    );
}

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
