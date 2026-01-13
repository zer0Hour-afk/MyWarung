@extends('layouts.app')

@section('content')
    <h2>Edit Kategori: {{ $kategori->nama }}</h2>

    <form action="{{ route('kategori.update', $kategori) }}" method="POST">
        @csrf 
        @method('PUT') 

        <div class="form-group">
            <label for="nama">Nama Kategori</label>

            <input type="text" id="nama" name="nama" value="{{ old('nama', $kategori->nama) }}">
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