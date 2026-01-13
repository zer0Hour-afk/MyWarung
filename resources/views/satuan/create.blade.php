@extends('layouts.app')

@section('content')
    <h2>Tambah Satuan</h2>

    <form action="{{ route('satuan.store') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 15px;">
            <label>Nama Satuan</label>
            <input type="text" name="nama" class="form-control" style="width: 100%; padding: 8px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Deskripsi (Opsional)</label>
            <textarea name="deskripsi" class="form-control" style="width: 100%; padding: 8px;"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('satuan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection