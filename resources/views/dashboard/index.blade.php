@extends('layouts.app')

@section('content')

<div class="dashboard-container">

    <div class="header-section">
        <div>
            <h1 class="page-title">SYSTEM DASHBOARD</h1>
            <p class="page-subtitle">
                Selamat bertugas, <span style="color: var(--primary-green); font-weight: bold;">{{ Auth::user()->nama_lengkap }}</span>
            </p>
        </div>

        <div class="date-badge">
            {{ now()->format('d M Y') }}
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card card-orange">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
            </div>
            <div class="stat-content">
                <h3>{{ $totalBarang }}</h3>
                <p>Total Item</p>
            </div>
        </div>

        <div class="stat-card card-purple">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
            </div>
            <div class="stat-content">
                <h3>{{ $totalKategori }}</h3>
                <p>Kategori</p>
            </div>
        </div>

        <div class="stat-card card-green">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"></path><path d="M12 2v20"></path><path d="M12 8h4a2 2 0 0 1 0 4h-4v-4Z"></path></svg>
            </div>
            <div class="stat-content">
                <h3>{{ $totalSatuan }}</h3>
                <p>Satuan</p>
            </div>
        </div>

        <div class="stat-card card-blue">
            <div class="stat-icon">
                <span style="font-weight: bold; font-size: 1.2rem;">Rp</span>
            </div>
            <div class="stat-content">
                <h3 style="font-size: 1.4rem;">{{ number_format($totalAset / 1000000, 1, ',', '.') }}jt</h3>
                <p>Total Aset</p>
            </div>
        </div>
    </div>

    <div class="dashboard-split">
        
        <div class="split-left">
            <div class="section-divider">
                <h2>Aksi Cepat</h2>
            </div>
            <div class="actions-grid">
                <a href="{{ route('barang.create') }}" class="action-btn text-decoration-none">
                    <span>+</span> Tambah Barang
                </a>
                <a href="{{ route('laporan.index') }}" class="action-btn secondary text-decoration-none">
                    Laporan Lengkap
                </a>
            </div>
        </div>

        <div class="split-right">
            <div class="section-divider warning">
                <h2>Perhatian: Stok Menipis</h2>
            </div>
            
            <div class="mini-table-container">
                <table class="mini-table">
                    @forelse($stokMenipis as $item)
                        <tr>
                            <td class="item-name">{{ $item->nama_barang }}</td>
                            <td class="item-stok">Sisa: <strong>{{ $item->stok }}</strong></td>
                            <td>
                                <a href="{{ route('barang.edit', $item->id) }}" class="btn-mini-edit">Restock</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center; color: #888; padding: 10px;">Semua stok aman.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>

    </div>

</div>

<style>
:root {
    --primary-orange: #ff9900;         
    --primary-orange-light: rgba(255, 153, 0, 0.15);
    --primary-purple: #7d52be;        
    --primary-purple-light: rgba(125, 82, 190, 0.15);
    --primary-green: #39ff14;       
    --primary-green-light: rgba(57, 255, 20, 0.15);
    --primary-blue: #00d4ff;
    --primary-blue-light: rgba(0, 212, 255, 0.15);
    --text-dark: #f4f4f4;
    --text-grey: #8a8a99;
    --bg-card: #15151a;
    --bg-border: #2e2e38;
}

.dashboard-container {
    max-width: 1200px; margin: 0 auto; padding: 1rem; color: var(--text-dark);
}

.header-section {
    display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem;
}

.page-title {
    font-size: 2rem; font-weight: 800; color: white; margin: 0; text-transform: uppercase; letter-spacing: 2px;
    text-shadow: 0 0 10px rgba(255,255,255,0.3); font-family: 'Rajdhani', sans-serif;
}
.page-subtitle { color: var(--text-grey); margin: 0.5rem 0 0 0; font-size: 1rem; }

.date-badge {
    background: var(--bg-card); padding: 0.5rem 1.5rem; border-radius: 4px; font-size: 1rem; font-weight: 600;
    color: var(--primary-green); border: 1px solid var(--primary-green); box-shadow: 0 0 10px rgba(57, 255, 20, 0.2);
    font-family: 'Rajdhani', sans-serif;
}

/* STATS GRID */
.stats-grid {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; margin-bottom: 3rem;
}
.stat-card {
    background: var(--bg-card); border-radius: 8px; padding: 1.5rem; display: flex; align-items: center; gap: 1rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.5); border: 1px solid var(--bg-border); transition: 0.3s;
}
.stat-card:hover { transform: translateY(-5px); border-color: var(--primary-green); }

.stat-icon { width: 50px; height: 50px; border-radius: 8px; display: flex; align-items: center; justify-content: center; }
.stat-content h3 { font-size: 2rem; font-weight: 800; margin: 0; line-height: 1; color: white; font-family: 'Rajdhani', sans-serif; }
.stat-content p { margin: 5px 0 0 0; font-size: 0.8rem; color: var(--text-grey); text-transform: uppercase; letter-spacing: 1px; }

.card-orange .stat-icon { background: var(--primary-orange-light); color: var(--primary-orange); }
.card-purple .stat-icon { background: var(--primary-purple-light); color: var(--primary-purple); }
.card-green .stat-icon { background: var(--primary-green-light); color: var(--primary-green); }
.card-blue .stat-icon { background: var(--primary-blue-light); color: var(--primary-blue); }

/* LAYOUT SPLIT */
.dashboard-split { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }
@media(max-width: 768px) { .dashboard-split { grid-template-columns: 1fr; } }

.section-divider h2 {
    font-size: 1.2rem; color: var(--text-dark); margin-bottom: 1rem; font-weight: 700;
    border-left: 3px solid var(--primary-purple); padding-left: 10px; font-family: 'Rajdhani', sans-serif; letter-spacing: 1px;
}
.section-divider.warning h2 { border-color: #e74c3c; color: #e74c3c; }

.actions-grid { display: flex; gap: 1rem; flex-wrap: wrap; }
.action-btn {
    padding: 1rem 2rem; border-radius: 4px; border: none; font-weight: 600; cursor: pointer; transition: 0.2s;
    background: var(--primary-purple); color: white; display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none;
    font-family: 'Rajdhani', sans-serif; letter-spacing: 1px;
}
.action-btn:hover { background: #5a329e; box-shadow: 0 0 15px rgba(125, 82, 190, 0.5); color: white; }
.action-btn.secondary { background: transparent; color: var(--primary-green); border: 1px solid var(--primary-green); }
.action-btn.secondary:hover { background: rgba(57, 255, 20, 0.1); }

/* MINI TABLE */
.mini-table-container { background: var(--bg-card); padding: 10px; border-radius: 8px; border: 1px solid var(--bg-border); }
.mini-table { width: 100%; border-collapse: collapse; }
.mini-table td { padding: 10px; border-bottom: 1px solid #222; color: #ccc; font-size: 0.9rem; }
.mini-table tr:last-child td { border-bottom: none; }
.item-name { font-weight: 600; color: white; }
.item-stok { color: #e74c3c; }
.btn-mini-edit { 
    font-size: 0.7rem; padding: 2px 8px; background: #333; color: white; text-decoration: none; border-radius: 3px; border: 1px solid #555;
}
.btn-mini-edit:hover { border-color: var(--primary-green); color: var(--primary-green); }
</style>
@endsection