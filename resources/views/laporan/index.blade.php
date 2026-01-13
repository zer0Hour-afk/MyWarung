@extends('layouts.app')

@section('content')
{{-- Load html2pdf library --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<div class="nerv-panel">
    <div class="header-section">
        <div>
            <div class="system-tag">DATA.ANALYTICS // REPORT_VIEW</div>
            <h2 class="page-title">LAPORAN STOK & ASET</h2>
        </div>
        
        <div class="flex gap-2">
            {{-- Tombol Cetak PDF --}}
            <button onclick="downloadPDF()" class="btn btn-print">
                🖨 CETAK PDF
            </button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                KEMBALI
            </a>
        </div>
    </div>

    {{-- Container ini yang akan dicetak --}}
    <div id="print-area">
        {{-- Kartu Ringkasan --}}
        <div class="report-cards">
            <div class="card-metric">
                <span class="metric-label">TOTAL NILAI ASET</span>
                <h3 class="metric-value">Rp {{ number_format($totalAset, 0, ',', '.') }}</h3>
            </div>
            
            <div class="card-metric" style="border-color: var(--color-accent);">
                <span class="metric-label" style="color: var(--color-accent);">ESTIMASI OMZET</span>
                <h3 class="metric-value">Rp {{ number_format($estimasiOmzet, 0, ',', '.') }}</h3>
            </div>
        </div>

        {{-- Tabel Stok Menipis --}}
        <div class="table-section mt-4">
            <h3 class="section-title">PERINGATAN STOK MENIPIS (< 10)</h3>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>NAMA BARANG</th>
                            <th>KATEGORI</th>
                            <th>SISA STOK</th>
                            <th>HARGA BELI</th>
                            <th width="150px" style="text-align: center;">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stokMenipis as $item)
                            <tr>
                                <td style="font-weight: 600; color: #fff;">{{ $item->nama_barang }}</td>
                                <td>{{ $item->kategori->nama ?? '-' }}</td>
                                <td class="font-tech" style="color: #e74c3c; font-size: 1.2rem;">{{ $item->stok }}</td>
                                <td class="font-tech">Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                <td style="text-align: center;">
                                    <span class="badge-critical">CRITICAL</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 2rem; color: var(--text-muted);">
                                    [ SEMUA STOK AMAN ]
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        {{-- Footer Cetak (Hanya muncul di PDF) --}}
        <div class="print-footer" style="display: none; margin-top: 20px; text-align: center; font-size: 0.8rem; color: #555;">
            Dicetak oleh: {{ Auth::user()->nama_lengkap }} pada {{ now()->format('d M Y H:i') }}
        </div>
    </div>
</div>

<script>
    function downloadPDF() {
        // Ambil elemen yang mau dicetak
        const element = document.getElementById('print-area');
        
        // Tampilkan footer cetak sementara
        const footer = document.querySelector('.print-footer');
        footer.style.display = 'block';

        // Konfigurasi PDF
        const opt = {
            margin:       0.5,
            filename:     'Laporan_Stok_MyWarung.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2, backgroundColor: '#15151a' }, // Background gelap agar sesuai tema
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
        };

        // Proses Cetak
        html2pdf().set(opt).from(element).save().then(function(){
            // Sembunyikan footer lagi setelah selesai
            footer.style.display = 'none';
        });
    }
</script>

<style>
    /* Tombol Cetak */
    .btn-print {
        background: var(--color-success); border: none; color: black;
        padding: 8px 20px; border-radius: 4px; font-weight: bold; cursor: pointer; transition: 0.3s;
    }
    .btn-print:hover { background: #32d911; box-shadow: 0 0 10px var(--color-success); }

    /* CSS GLOBAL YANG SAMA */
    .nerv-panel { animation: fadeIn 0.5s ease-out; max-width: 1200px; margin: 0 auto; padding: 1rem; }
    .header-section { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; border-bottom: 1px solid var(--color-border); padding-bottom: 1rem; }
    .system-tag { color: var(--color-success); font-size: 0.7rem; letter-spacing: 2px; font-family: 'Rajdhani', sans-serif; margin-bottom: 5px; }
    .page-title { margin: 0; border: none; padding: 0; font-size: 2rem; color: var(--color-accent); font-weight: 800; }
    .font-tech { font-family: 'Rajdhani', sans-serif; letter-spacing: 1px; }

    .btn-secondary {
        background: transparent; border: 1px solid #888; color: #888; padding: 8px 20px; text-decoration: none; transition: 0.3s; border-radius: 4px; font-weight: 600;
    }
    .btn-secondary:hover { border-color: #fff; color: #fff; background: rgba(255,255,255,0.1); }

    .report-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-bottom: 3rem; }
    .card-metric { background: #15151a; border: 1px solid var(--color-success); padding: 1.5rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.5); }
    .metric-label { font-family: 'Rajdhani', sans-serif; color: var(--color-success); letter-spacing: 2px; font-size: 0.9rem; display: block; margin-bottom: 0.5rem; font-weight: 700; }
    .metric-value { font-size: 2.5rem; font-weight: 700; color: #fff; margin: 0; }

    .section-title { color: #e74c3c; font-family: 'Rajdhani', sans-serif; letter-spacing: 1px; margin-bottom: 1rem; border-left: 4px solid #e74c3c; padding-left: 15px; font-size: 1.2rem; }

    .table-responsive { border-radius: 8px; overflow: hidden; border: 1px solid var(--color-border); }
    .table-responsive table { width: 100%; border-collapse: collapse; background-color: #15151a; }
    .table-responsive thead { background-color: var(--color-accent); }
    .table-responsive th { text-align: left; padding: 1rem 1.5rem; color: #ffffff !important; font-size: 0.9rem; letter-spacing: 1px; font-weight: 800; text-transform: uppercase; border-bottom: none; }
    .table-responsive td { padding: 1rem 1.5rem; border-bottom: 1px solid #222; color: #e0e0e0; }

    .badge-critical { background: rgba(231, 76, 60, 0.2); color: #e74c3c; padding: 5px 10px; font-size: 0.75rem; border: 1px solid #e74c3c; letter-spacing: 1px; border-radius: 4px; font-weight: 700; }
</style>
@endsection