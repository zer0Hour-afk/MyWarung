<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Pemasok;
use App\Models\Barang;

class DataKelontongSeeder extends Seeder
{
    public function run()
    {
        Pengguna::create([
            'nama_pengguna' => 'admin',
            'kata_sandi'    => Hash::make('admin123'),
            'nama_lengkap'  => 'Administrator Utama',
            'peran'         => 'admin',
            'telepon'       => '08123456789',
            'email'         => 'admin@mywarung.com',
            'status_aktif'  => 1
        ]);

        Pengguna::create([
            'nama_pengguna' => 'kasir',
            'kata_sandi'    => Hash::make('kasir123'),
            'nama_lengkap'  => 'Staff Kasir',
            'peran'         => 'kasir',
            'telepon'       => '08987654321',
            'email'         => 'kasir@mywarung.com',
            'status_aktif'  => 1
        ]);

        $katMakan = Kategori::create(['nama' => 'Makanan']);
        $katMinum = Kategori::create(['nama' => 'Minuman']);
        $katRumah = Kategori::create(['nama' => 'Kebutuhan Rumah']);
        $katMandi = Kategori::create(['nama' => 'Perawatan Tubuh']);

        $satPcs   = Satuan::create(['nama' => 'Pcs', 'deskripsi' => 'Satuan per item']);
        $satBotol = Satuan::create(['nama' => 'Botol', 'deskripsi' => 'Botol plastik/kaca']);
        $satDus   = Satuan::create(['nama' => 'Dus', 'deskripsi' => 'Karton box']);
        $satKg    = Satuan::create(['nama' => 'Kg', 'deskripsi' => 'Kilogram']);

        $sup1 = Pemasok::create([
            'nama_pemasok' => 'PT Indofood Sukses Makmur',
            'kontak_person' => 'Budi Santoso',
            'telepon' => '021555666',
            'alamat' => 'Jakarta Selatan'
        ]);
        
        $sup2 = Pemasok::create([
            'nama_pemasok' => 'Agen Sembako Maju',
            'kontak_person' => 'Siti Aminah',
            'telepon' => '0811223344',
            'alamat' => 'Pasar Baru'
        ]);

        Barang::create([
            'kode_barcode' => '89911001',
            'nama_barang' => 'Indomie Goreng',
            'kategori_id' => $katMakan->id,
            'satuan_id' => $satPcs->id,
            'harga_beli' => 2500,
            'harga_jual' => 3000,
            'stok' => 200,
            'pemasok_id' => $sup1->id
        ]);

        Barang::create([
            'kode_barcode' => '89922002',
            'nama_barang' => 'Aqua 600ml',
            'kategori_id' => $katMinum->id,
            'satuan_id' => $satBotol->id,
            'harga_beli' => 3000,
            'harga_jual' => 5000,
            'stok' => 150,
            'pemasok_id' => $sup2->id
        ]);

        Barang::create([
            'kode_barcode' => '89933003',
            'nama_barang' => 'Sabun Cuci Piring',
            'kategori_id' => $katRumah->id,
            'satuan_id' => $satPcs->id,
            'harga_beli' => 10000,
            'harga_jual' => 12500,
            'stok' => 5,
            'pemasok_id' => $sup2->id
        ]);
    }
}