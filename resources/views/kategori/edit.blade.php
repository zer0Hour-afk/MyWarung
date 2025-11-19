@extends('layouts.app')

@section('content')
    <h2>Edit Kategori: {{ $kategori->nama }}</h2>

    {{-- Form mengarah ke route 'kategori.update' --}}
    {{-- Kita juga mengirimkan $kategori->id (atau $kategori) agar route tahu data mana yang diupdate --}}
    <form action="{{ route('kategori.update', $kategori) }}" method="POST">
        @csrf {{-- Token CSRF --}}
        @method('PUT') {{-- Method PUT untuk update --}}

        <div class="form-group">
            <label for="nama">Nama Kategori</label>
            
            {{-- 
              value="{{ old('nama', $kategori->nama) }}" 
              Artinya: Ambil input lama 'nama', jika tidak ada, ambil data asli '$kategori->nama'
            --}}
            <input type="text" id="nama" name="nama" value="{{ old('nama', $kategori->nama) }}">

            {{-- Menampilkan pesan error validasi --}}
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('kategori.index') }}" style="text-decoration: none; color: grey; margin-right: 1rem;">
            Batal
        </a>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection