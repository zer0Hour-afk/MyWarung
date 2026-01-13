<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    public $timestamps = false; 

    protected $fillable = [
        'kode_barcode',
        'nama_barang',
        'id_kategori',
        'id_satuan',
        'harga_beli',
        'harga_jual',
        'stok',
        'id_pemasok',
        'id_pengguna', 
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'id_pemasok');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function detailPembelian()
    {
        return $this->hasMany(DetailPembelian::class, 'id_barang');
    }

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_barang');
    }

    public function riwayatStok()
    {
        return $this->hasMany(RiwayatStok::class, 'id_barang');
    }
}