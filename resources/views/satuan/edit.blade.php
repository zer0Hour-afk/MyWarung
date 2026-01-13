@extends('layouts.app')

@section('content')
    <h2>Edit Satuan</h2>

    <form action="{{ route('satuan.update', $satuan->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group" style="margin-bottom: 15px;">
            <label>Nama Satuan</label>
            <input type="text" name="nama" value="{{ $satuan->nama }}" class="form-control" style="width: 100%; padding: 8px;" required>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Deskripsi (Opsional)</label>
            <textarea name="deskripsi" class="form-control" style="width: 100%; padding: 8px;">{{ $satuan->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('satuan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection