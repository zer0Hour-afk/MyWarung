<?php

namespace App\Http\Controllers;

use App\Models\Kategori; // Import Model
use App\Http\Requests\StoreKategoriRequest; // Import Request
use App\Http\Requests\UpdateKategoriRequest; // Import Request

class KategoriController extends Controller
{
    /**
     * Tampilkan daftar read
     */
    public function index()
    {
        $kategoris = Kategori::paginate(10); // Ambil data dengan pagination
        return view('kategori.index', compact('kategoris')); // Kirim data ke view
    }

    /**
     * Tampilkan form tambah data create
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Simpan data baru create
     */
    public function store(StoreKategoriRequest $request)
    {
        // Validasi otomatis dijalankan oleh StoreKategoriRequest
        
        Kategori::create($request->validated()); // Simpan data tervalidasi

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail data read
     */
    public function show(Kategori $kategori)
    {
        // $kategori otomatis di-fetch berdasarkan ID di URL
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Tampilkan form edit data update
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update data di database 
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        // Validasi otomatis oleh UpdateKategoriRequest
        
        $kategori->update($request->validated());

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Hapus data delete
     */
    public function destroy(Kategori $kategori)
    {
        // Cek dulu jika kategori masih dipakai di tabel barang
        if ($kategori->barang()->count() > 0) {
            return redirect()->route('kategori.index')
                             ->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh barang.');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori berhasil dihapus.');
    }
}