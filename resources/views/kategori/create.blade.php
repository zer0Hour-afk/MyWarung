@extends('layouts.app')

@section('content')
    <h2>Tambah Kategori Baru</h2>

    {{-- Form mengarah ke route 'kategori.store' dengan method POST --}}
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf {{-- Wajib ada token CSRF --}}

        <div class="form-group">
            <label for="nama">Nama Kategori</label>
            
            {{-- 'old('nama')' untuk menyimpan input lama jika validasi gagal --}}
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}">

            {{-- Menampilkan pesan error validasi untuk field 'nama' --}}
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('kategori.index') }}" style="text-decoration: none; color: grey; margin-right: 1rem;">
            Batal
        </a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection