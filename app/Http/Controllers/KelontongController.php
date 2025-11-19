<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class KelontongController extends Controller
{
    public function index()
    {
        $barang = DB::table('barang')->get();
        return view('kelontong', ['barang' => $barang]);
    }
}
