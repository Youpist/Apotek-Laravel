<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksis';
    protected $fillable = [
        'transaksi_id',
        'obat_id',
        'jumlah',
        'harga',
        'subtotal'
    ];

    public function transaksis(){
        return $this->belongsTo(Transaksi::class);
    }

    public function obat(){
        return $this->belongsTo(Obat::class);
    }   
}
