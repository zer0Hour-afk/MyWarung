<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Pemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with(['kategori', 'satuan', 'pemasok'])
                         ->paginate(10);
                         
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $satuans = Satuan::all();
        $pemasoks = Pemasok::all();
        
        return view('barang.create', compact('kategoris', 'satuans', 'pemasoks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barcode' => 'nullable|unique:barang,kode_barcode',
            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'id_satuan' => 'required',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'id_pemasok' => 'required',
        ]);

        $data = $request->all();
        $data['id_pengguna'] = Auth::id();

        Barang::create($data);

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(Barang $barang)
    {
        $barang->load(['kategori', 'satuan', 'pemasok', 'pengguna']);
        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();
        $satuans = Satuan::all();
        $pemasoks = Pemasok::all();
        
        return view('barang.edit', compact('barang', 'kategoris', 'satuans', 'pemasoks'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barcode' => 'nullable|unique:barang,kode_barcode,' . $barang->id,
            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'id_satuan' => 'required',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'id_pemasok' => 'required',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        try {
            $barang->delete();
            return redirect()->route('barang.index')
                             ->with('success', 'Barang berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('barang.index')
                             ->with('error', 'Barang tidak dapat dihapus karena sudah terkait dengan transaksi.');
        }
    }
}