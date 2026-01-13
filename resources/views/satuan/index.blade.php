@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="nerv-panel">
    <div class="header-section">
        <div>
            <div class="system-tag">DATA.BASE // UNIT_LIST</div>
            <h2 class="page-title">MANAJEMEN SATUAN</h2>
        </div>
        
        <a href="{{ route('satuan.create') }}" class="btn btn-primary">
            <span style="margin-right: 8px; font-weight:bold;">[+]</span> TAMBAH SATUAN
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th width="80px">NO</th>
                    <th>NAMA SATUAN</th>
                    <th>DESKRIPSI</th>
                    <th width="220px" style="text-align: center;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($satuan as $item)
                    <tr>
                        <td class="font-tech">#{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</td>
                        <td style="font-weight: 600; color: #fff;">{{ $item->nama }}</td>
                        <td style="color: var(--text-muted);">{{ $item->deskripsi ?? '-' }}</td>
                        <td style="text-align: center;">
                            <div class="action-group">
                                <a href="{{ route('satuan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    EDIT
                                </a>

                                <form id="delete-form-{{ $item->id }}" action="{{ route('satuan.destroy', $item->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE') 
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $item->id }})">
                                        HAPUS
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                            [ TIDAK ADA DATA SATUAN YANG DITEMUKAN ]
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'WARNING: SECURITY ALERT',
            text: "Data satuan ini akan dihapus. Lanjutkan?",
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

{{-- Style CSS --}}
<style>
    .nerv-popup-border {
        border: 1px solid var(--eva-green, #39ff14) !important;
        border-radius: 0 !important;
        box-shadow: 0 0 20px rgba(57, 255, 20, 0.2);
    }
    .btn-danger { background: transparent; border: 1px solid #e74c3c; color: #e74c3c; cursor: pointer; }
    .btn-danger:hover { background: #e74c3c; color: white; box-shadow: 0 0 15px rgba(231, 76, 60, 0.6); }
    .btn-sm { padding: 5px 15px; font-size: 0.8rem; min-width: 60px; }
    .nerv-panel { animation: fadeIn 0.5s ease-out; }
    .header-section { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; border-bottom: 1px solid var(--eva-border, #444); padding-bottom: 1rem; }
    .system-tag { color: var(--eva-green, #39ff14); font-size: 0.7rem; letter-spacing: 2px; font-family: 'Rajdhani', sans-serif; margin-bottom: 5px; }
    .page-title { margin: 0; border: none; padding: 0; font-size: 2rem; }
    .font-tech { font-family: 'Rajdhani', sans-serif; color: var(--eva-green, #39ff14); letter-spacing: 1px; }
    .action-group { display: flex; justify-content: center; gap: 10px; }
    .delete-form { display: inline; }
</style>
@endsection