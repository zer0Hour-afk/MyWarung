@extends('layouts.app')

@section('content')
{{-- Load SweetAlert2 dari CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="nerv-panel">
    <div class="header-section">
        <div>
            <div class="system-tag">DATA.BASE // CATEGORY_LIST</div>
            <h2 class="page-title">MANAJEMEN KATEGORI</h2>
        </div>
        
        <a href="{{ route('kategori.create') }}" class="btn btn-primary">
            <span style="margin-right: 8px; font-weight:bold;">[+]</span> TAMBAH KATEGORI
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th width="80px">ID.REF</th>
                    <th>KATEGORI.NAME</th>
                    <th width="220px" style="text-align: center;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategoris as $kategori)
                    <tr>
                        <td class="font-tech">#{{ str_pad($kategori->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td style="font-weight: 600; color: #fff;">{{ $kategori->nama }}</td>
                        <td style="text-align: center;">
                            <div class="action-group">
                                <a href="{{ route('kategori.edit', $kategori) }}" class="btn btn-sm btn-warning">
                                    EDIT
                                </a>

                                {{-- Form Hapus dengan ID unik --}}
                                <form id="delete-form-{{ $kategori->id }}" action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE') 
                                    
                                    {{-- Panggil fungsi JS custom saat diklik --}}
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $kategori->id }})">
                                        HAPUS
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                            [ NO DATA FOUND IN SYSTEM ]
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $kategoris->links() }}
    </div>
</div>

<script>
    // Fungsi Kustom SweetAlert gaya NERV
    function confirmDelete(id) {
        Swal.fire({
            title: 'WARNING: SECURITY ALERT',
            text: "Data kategori ini akan dihapus PURGED. Lanjutkan?",
            icon: 'warning',
            showCancelButton: true,
            // Styling Gelap NERV
            background: '#15151a', 
            color: '#eeeeee',
            confirmButtonColor: '#e74c3c', // Merah
            cancelButtonColor: '#734CA6',  // Ungu
            confirmButtonText: 'YA!, HAPUSSSSS!!!!',
            cancelButtonText: 'BATAL',
            // Bentuk kotak tajam ala Mecha
            customClass: {
                popup: 'nerv-popup-border'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form secara manual jika user klik YES
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>

<style>
    /* --- CSS Tambahan --- */
    
    /* Membuat SweetAlert jadi kotak tajam (tidak rounded) */
    .nerv-popup-border {
        border: 1px solid var(--eva-green) !important;
        border-radius: 0 !important;
        box-shadow: 0 0 20px rgba(57, 255, 20, 0.2);
    }

    /* Style Button Danger */
    .btn-danger {
        background-color: transparent;
        border: 1px solid #e74c3c;
        color: #e74c3c;
        cursor: pointer;
    }
    .btn-danger:hover {
        background-color: #e74c3c;
        color: white;
        box-shadow: 0 0 15px rgba(231, 76, 60, 0.6);
    }

    /* Ukuran tombol kecil */
    .btn-sm {
        padding: 5px 15px;
        font-size: 0.8rem;
        min-width: 60px;
    }

    /* Header Layout */
    .nerv-panel { animation: fadeIn 0.5s ease-out; }
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 2rem;
        border-bottom: 1px solid var(--eva-border);
        padding-bottom: 1rem;
    }
    .system-tag {
        color: var(--eva-green);
        font-size: 0.7rem;
        letter-spacing: 2px;
        font-family: 'Rajdhani', sans-serif;
        margin-bottom: 5px;
    }
    .page-title { margin: 0; border: none; padding: 0; font-size: 2rem; }

    /* Tabel Utils */
    .font-tech { font-family: 'Rajdhani', sans-serif; color: var(--eva-green); letter-spacing: 1px; }
    .action-group { display: flex; justify-content: center; gap: 10px; }
    .delete-form { display: inline; }

    /* Paginasi Gelap */
    .pagination-wrapper { margin-top: 2rem; display: flex; justify-content: flex-end; }
    .pagination-wrapper nav { background: transparent !important; box-shadow: none !important; }
    .pagination-wrapper .page-item .page-link, .pagination-wrapper span, .pagination-wrapper a {
        background-color: #0e0e12 !important;
        border-color: var(--eva-border) !important;
        color: var(--text-muted) !important;
        border-radius: 0 !important;
        padding: 8px 16px;
        font-family: 'Rajdhani', sans-serif;
    }
    .pagination-wrapper .active .page-link, .pagination-wrapper .active span {
        background-color: var(--eva-purple) !important;
        color: white !important;
        border-color: var(--eva-purple) !important;
        box-shadow: 0 0 10px rgba(115, 76, 166, 0.4);
    }
</style>
@endsection