<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';
    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'kategori',
        'harga',
        'stok',
        'expired_date'
    ];

    public function detailTransaksis(){
        return $this->hasMany(DetailTransaksi::class);
    }
}
