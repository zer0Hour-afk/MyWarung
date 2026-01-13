@extends('layouts.app')

@section('content')
{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="nerv-panel">
    <div class="header-section">
        <div>
            <div class="system-tag">DATA.BASE // ITEM_INVENTORY</div>
            <h2 class="page-title">MANAJEMEN BARANG</h2>
        </div>
        
        <a href="{{ route('barang.create') }}" class="btn btn-primary">
            <span style="margin-right: 8px; font-weight:bold;">[+]</span> TAMBAH BARANG
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>KODE</th>
                    <th>NAMA BARANG</th>
                    <th>KAT / SAT</th>
                    <th>STOK</th>
                    <th>HARGA BELI</th>
                    <th>HARGA JUAL</th>
                    <th>PEMASOK</th>
                    <th width="180px" style="text-align: center;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $barang)
                    <tr>
                        <td class="font-tech">{{ $barang->kode_barcode ?? '-' }}</td>
                        <td style="font-weight: 600; color: #fff;">{{ $barang->nama_barang }}</td>
                        <td style="font-size: 0.85rem; color: var(--text-muted);">
                            {{ $barang->kategori->nama ?? '-' }} / {{ $barang->satuan->nama ?? '-' }}
                        </td>
                        <td class="font-tech" style="color: {{ $barang->stok < 10 ? '#e74c3c' : 'var(--eva-green)' }}">
                            {{ $barang->stok }}
                        </td>
                        <td class="font-tech">Rp {{ number_format($barang->harga_beli, 0, ',', '.') }}</td>
                        <td class="font-tech" style="color: #fff;">Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                        <td style="font-size: 0.85rem; color: var(--text-muted);">
                            {{ Str::limit($barang->pemasok->nama_pemasok ?? '-', 15) }}
                        </td>
                        <td style="text-align: center;">
                            <div class="action-group">
                                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-warning">
                                    EDIT
                                </a>

                                <form id="delete-form-{{ $barang->id }}" action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE') 
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $barang->id }})">
                                        HAPUS
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                            [ TIDAK ADA DATA BARANG YANG DITEMUKAN ]
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $barangs->links() }}
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'WARNING: SECURITY ALERT',
            text: "Data barang ini akan dihapus permanen. Lanjutkan?",
            icon: 'warning',
            showCancelButton: true,
            background: '#15151a', 
            color: '#eeeeee',
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#734CA6',
            confirmButtonText: 'YA, HAPUS!',
            cancelButtonText: 'BATAL',
            customClass: { popup: 'nerv-popup-border' }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>

<style>
    .nerv-popup-border {
        border: 1px solid var(--eva-green, #39ff14) !important;
        border-radius: 0 !important;
        box-shadow: 0 0 20px rgba(57, 255, 20, 0.2);
    }
    .btn-danger { background: transparent; border: 1px solid #e74c3c; color: #e74c3c; cursor: pointer; }
    .btn-danger:hover { background: #e74c3c; color: white; box-shadow: 0 0 15px rgba(231, 76, 60, 0.6); }
    .btn-sm { padding: 4px 10px; font-size: 0.75rem; min-width: 50px; }
    .nerv-panel { animation: fadeIn 0.5s ease-out; }
    .header-section { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; border-bottom: 1px solid var(--eva-border, #444); padding-bottom: 1rem; }
    .system-tag { color: var(--eva-green, #39ff14); font-size: 0.7rem; letter-spacing: 2px; font-family: 'Rajdhani', sans-serif; margin-bottom: 5px; }
    .page-title { margin: 0; border: none; padding: 0; font-size: 2rem; }
    .font-tech { font-family: 'Rajdhani', sans-serif; color: var(--eva-green, #39ff14); letter-spacing: 1px; }
    .action-group { display: flex; justify-content: center; gap: 5px; }
    .delete-form { display: inline; }
    
    .pagination-wrapper { margin-top: 2rem; display: flex; justify-content: flex-end; }
    .pagination-wrapper nav { background: transparent !important; box-shadow: none !important; }
    .pagination-wrapper .page-item .page-link, .pagination-wrapper span, .pagination-wrapper a {
        background-color: #0e0e12 !important;
        border-color: #444 !important;
        color: #888 !important;
        border-radius: 0 !important;
        padding: 8px 16px;
        font-family: 'Rajdhani', sans-serif;
    }
    .pagination-wrapper .active .page-link {
        background-color: #734CA6 !important;
        color: white !important;
        border-color: #734CA6 !important;
    }
</style>
@endsection