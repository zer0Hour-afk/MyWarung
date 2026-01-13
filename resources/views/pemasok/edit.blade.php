@extends('layouts.app')

@section('content')
    <h2>Edit Pemasok</h2>

    <form action="{{ route('pemasok.update', $pemasok->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Nama Pemasok</label>
            <input type="text" name="nama_pemasok" value="{{ $pemasok->nama_pemasok }}" class="form-control" style="width: 100%; padding: 8px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Kontak Person</label>
            <input type="text" name="kontak_person" value="{{ $pemasok->kontak_person }}" class="form-control" style="width: 100%; padding: 8px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Telepon</label>
            <input type="text" name="telepon" value="{{ $pemasok->telepon }}" class="form-control" style="width: 100%; padding: 8px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Email</label>
            <input type="email" name="email" value="{{ $pemasok->email }}" class="form-control" style="width: 100%; padding: 8px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" style="width: 100%; padding: 8px;" required>{{ $pemasok->alamat }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pemasok.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection