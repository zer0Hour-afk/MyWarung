<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori; // Butuh untuk dropdown
use App\Models\Satuan;   // Butuh untuk dropdown
use App\Models\Pemasok;  // Butuh untuk dropdown
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Illuminate\Support\Facades\Auth; // Untuk ambil ID pengguna login

class BarangController extends Controller
{
    /**
     * Tampilkan daftar (Read)
     */
    public function index()
    {
        // Eager loading relasi untuk performa (hindari N+1 query)
        $barangs = Barang::with(['kategori', 'satuan', 'pemasok'])
                         ->paginate(10);
                         
        return view('barang.index', compact('barangs'));
    }

    /**
     * Tampilkan form tambah data (Create)
     */
    public function create()
    {
        // Ambil data untuk dropdown di form
        $kategoris = Kategori::all();
        $satuans = Satuan::all();
        $pemasoks = Pemasok::all();
        
        return view('barang.create', compact('kategoris', 'satuans', 'pemasoks'));
    }

    /**
     * Simpan data baru (Create)
     */
    public function store(StoreBarangRequest $request)
    {
        $data = $request->validated();
        
        // Tambahkan id_pengguna dari user yang sedang login
        $data['id_pengguna'] = Auth::id(); // Atau auth()->id()

        Barang::create($data);

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail data (Read)
     */
    public function show(Barang $barang)
    {
        // Load relasi agar bisa ditampilkan di view
        $barang->load(['kategori', 'satuan', 'pemasok', 'pengguna']);
        return view('barang.show', compact('barang'));
    }

    /**
     * Tampilkan form edit data (Update)
     */
    public function edit(Barang $barang)
    {
        // Kirim juga data untuk dropdown
        $kategoris = Kategori::all();
        $satuans = Satuan::all();
        $pemasoks = Pemasok::all();
        
        return view('barang.edit', compact('barang', 'kategoris', 'satuans', 'pemasoks'));
    }

    /**
     * Update data di database (Update)
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $data = $request->validated();
        
        // Opsional: rekam siapa yang mengupdate
        // $data['id_pengguna_update'] = Auth::id(); // (Perlu tambah kolom di DB)

        $barang->update($data);

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Hapus data (Delete)
     */
    public function destroy(Barang $barang)
    {
        try {
            $barang->delete();
            return redirect()->route('barang.index')
                             ->with('success', 'Barang berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Tangkap error jika ada foreign key constraint
            return redirect()->route('barang.index')
                             ->with('error', 'Barang tidak dapat dihapus karena sudah terkait dengan transaksi.');
        }
    }
}