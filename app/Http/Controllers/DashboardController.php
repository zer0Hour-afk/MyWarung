<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();
        $totalKategori = Kategori::count();
        $totalSatuan = Satuan::count();
        
        $totalAset = Barang::sum(DB::raw('harga_beli * stok'));

        $stokMenipis = Barang::where('stok', '<', 10)
                             ->orderBy('stok', 'asc')
                             ->limit(5)
                             ->get();

        return view('dashboard.index', compact(
            'totalBarang', 
            'totalKategori', 
            'totalSatuan', 
            'totalAset',
            'stokMenipis'
        ));
    }
}