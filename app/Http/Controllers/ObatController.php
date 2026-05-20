<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $search = $request->search;

    $obats = Obat::when($search, function ($query) use ($search) {

            $query->where('nama_obat', 'like', '%' . $search . '%')
                  ->orWhere('kode_obat', 'like', '%' . $search . '%')
                  ->orWhere('kategori', 'like', '%' . $search . '%');

        })
        ->orderBy('kode_obat', 'asc')
        ->paginate(10);

    return view(
        'obat.index',
        compact('obats')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $obatTerakhir = Obat::latest()->first();

    if ($obatTerakhir) {

        $angka = substr($obatTerakhir->kode_obat, 3);

        $kode = 'OBT' . str_pad($angka + 1, 3, '0', STR_PAD_LEFT);

    } else {

        $kode = 'OBT001';
    }

    return view('obat.create', compact('kode'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:obats',
            'nama_obat' => 'required',
            'kategori' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'expired_date' => 'required|date'
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(int $id)
    {
        $obats = Obat::findOrFail($id);
        return view('obat.edit', compact('obats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {
        $obats = Obat::findOrFail($id);

        $obats->update($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $obats = Obat::findOrFail($id);
        $obats->delete();

        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus.');
    }

    
}
