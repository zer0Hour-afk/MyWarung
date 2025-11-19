<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Pemasok;
use App\Models\Pengguna;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data dari setiap tabel
        $totalBarang = Barang::count();
        $totalKategori = Kategori::count();
        $totalSatuan = Satuan::count();

        return view('dashboard.index', compact(
            'totalBarang', 'totalKategori', 'totalSatuan'
        ));
    }
}

