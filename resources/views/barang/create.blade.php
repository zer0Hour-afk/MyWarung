@extends('layouts.app')

@section('content')
    <h2>Tambah Barang Baru</h2>

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        {{-- Baris 1: Kode & Nama --}}
        <div style="display: flex; gap: 1rem;">
            <div class="form-group" style="flex: 1;">
                <label for="kode_barcode">Kode Barcode (Opsional)</label>
                <input type="text" id="kode_barcode" name="kode_barcode" value="{{ old('kode_barcode') }}">
                @error('kode_barcode')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group" style="flex: 2;">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" required>
                @error('nama_barang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Baris 2: Relasi (Kategori, Satuan, Pemasok) --}}
        <div style="display: flex; gap: 1rem;">
            <div class="form-group" style="flex: 1;">
                <label for="id_kategori">Kategori</label>
                <select id="id_kategori" name="id_kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('id_kategori') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
                @error('id_kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group" style="flex: 1;">
                <label for="id_satuan">Satuan</label>
                <select id="id_satuan" name="id_satuan" required>
                    <option value="">-- Pilih Satuan --</option>
                    @foreach ($satuans as $satuan)
                        <option value="{{ $satuan->id }}" {{ old('id_satuan') == $satuan->id ? 'selected' : '' }}>
                            {{ $satuan->nama }}
                        </option>
                    @endforeach
                </select>
                @error('id_satuan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group" style="flex: 1;">
                <label for="id_pemasok">Pemasok</label>
                <select id="id_pemasok" name="id_pemasok" required>
                    <option value="">-- Pilih Pemasok --</option>
                    @foreach ($pemasoks as $pemasok)
                        <option value="{{ $pemasok->id }}" {{ old('id_pemasok') == $pemasok->id ? 'selected' : '' }}>
                            {{ $pemasok->nama_pemasok }}
                        </option>
                    @endforeach
                </select>
                @error('id_pemasok')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        {{-- Baris 3: Harga & Stok --}}
        <div style="display: flex; gap: 1rem;">
            <div class="form-group" style="flex: 1;">
                <label for="harga_beli">Harga Beli</label>
                <input type="number" id="harga_beli" name="harga_beli" value="{{ old('harga_beli', 0) }}" min="0" required>
                @error('harga_beli')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group" style="flex: 1;">
                <label for="harga_jual">Harga Jual</label>
                <input type="number" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', 0) }}" min="0" required>
                @error('harga_jual')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group" style="flex: 1;">
                <label for="stok">Stok Awal</label>
                <input type="number" id="stok" name="stok" value="{{ old('stok', 0) }}" min="0" required>
                @error('stok')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <br>
        <a href="{{ route('barang.index') }}" style="text-decoration: none; color: grey; margin-right: 1rem;">
            Batal
        </a>
        <button type="submit" class="btn btn-primary">Simpan Barang</button>
    </form>
@endsection

{{-- CSS Tambahan (Opsional, letakkan di <style> layout) --}}
<style>
    select { width: 100%; padding: 8px; box-sizing: border-box; }
    input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
</style>