<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    public function index()
    {
        $pemasok = Pemasok::all();
        return view('pemasok.index', compact('pemasok'));
    }

    public function create()
    {
        return view('pemasok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemasok' => 'required|string|max:100',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'alamat' => 'required|string|max:255',
            'kontak_person' => 'required|string|max:100',
        ]);

        Pemasok::create($request->all());

        return redirect()->route('pemasok.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Pemasok $pemasok)
    {
        return view('pemasok.edit', compact('pemasok'));
    }

    public function update(Request $request, Pemasok $pemasok)
    {
        $request->validate([
            'nama_pemasok' => 'required|string|max:100',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'alamat' => 'required|string|max:255',
            'kontak_person' => 'required|string|max:100',
        ]);

        $pemasok->update($request->all());

        return redirect()->route('pemasok.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Pemasok $pemasok)
    {
        $pemasok->delete();
        return redirect()->route('pemasok.index')->with('success', 'Data berhasil dihapus');
    }
}