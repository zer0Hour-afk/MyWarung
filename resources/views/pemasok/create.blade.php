@extends('layouts.app')

@section('content')
    <h2>Tambah Pemasok</h2>

    <form action="{{ route('pemasok.store') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 15px;">
            <label>Nama Pemasok</label>
            <input type="text" name="nama_pemasok" class="form-control" style="width: 100%; padding: 8px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Kontak Person</label>
            <input type="text" name="kontak_person" class="form-control" style="width: 100%; padding: 8px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" style="width: 100%; padding: 8px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Email</label>
            <input type="email" name="email" class="form-control" style="width: 100%; padding: 8px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" style="width: 100%; padding: 8px;" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pemasok.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection