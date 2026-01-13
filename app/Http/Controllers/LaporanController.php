<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $totalAset = Barang::sum(DB::raw('harga_beli * stok'));

        $estimasiOmzet = Barang::sum(DB::raw('harga_jual * stok'));

        $stokMenipis = Barang::where('stok', '<', 10)->get();

        return view('laporan.index', compact('totalAset', 'estimasiOmzet', 'stokMenipis'));
    }
}