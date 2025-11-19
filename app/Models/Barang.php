<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    public $timestamps = false; // Asumsi tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'kode_barcode',
        'nama_barang',
        'id_kategori',
        'id_satuan',
        'harga_beli',
        'harga_jual',
        'stok',
        'id_pemasok',
        'id_pengguna', // Pengguna yang input
    ];

    /**
     * Relasi: Barang ini milik satu Kategori.
     */
    public function kategori()
    {
        // Parameter kedua adalah foreign key di tabel 'barang' ini
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    /**
     * Relasi: Barang ini milik satu Satuan.
     */
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

    /**
     * Relasi: Barang ini milik satu Pemasok.
     */
    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'id_pemasok');
    }

    /**
     * Relasi: Barang ini diinput oleh satu Pengguna.
     */
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    // Relasi lain ke detail_pembelian, detail_penjualan, riwayat_stok
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