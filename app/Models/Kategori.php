<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori'; 
    
    // Nonaktifkan timestamps
    public $timestamps = false;

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama',
    ];

    /**
     * Relasi: Satu Kategori punya banyak Barang.
     */
    public function barang()
    {
        // Parameter kedua adalah foreign key di tabel 'barang'
        return $this->hasMany(Barang::class, 'id_kategori');
    }
}
