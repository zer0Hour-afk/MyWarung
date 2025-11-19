@extends('layouts.app')

@section('content')
    <h2>Manajemen Barang</h2>

    <a href="{{ route('barang.create') }}" class="btn btn-primary" style="margin-bottom: 1rem;">
        + Tambah Barang Baru
    </a>

    <table style="font-size: 0.9rem;"> {{-- Perkecil font agar muat --}}
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Harga Beli (Rp)</th>
                <th>Harga Jual (Rp)</th>
                <th>Pemasok</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($barangs as $barang)
                <tr>
                    <td>{{ $barang->kode_barcode ?? '-' }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    {{-- Akses data relasi yang sudah di-load --}}
                    <td>{{ $barang->kategori->nama ?? 'N/A' }}</td>
                    <td>{{ $barang->satuan->nama ?? 'N/A' }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td style="text-align: right;">{{ number_format($barang->harga_beli, 0, ',', '.') }}</td>
                    <td style="text-align: right;">{{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                    <td>{{ $barang->pemasok->nama_pemasok ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('barang.edit', $barang) }}" class="btn btn-warning">
                            Edit
                        </a>
                        <form action="{{ route('barang.destroy', $barang) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-danger" 
                                    onclick="return confirm('Yakin hapus {{ $barang->nama_barang }}?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center;">Tidak ada data barang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Link Paginasi --}}
    <div style="margin-top: 1rem;">
        {{ $barangs->links() }}
    </div>

@endsection