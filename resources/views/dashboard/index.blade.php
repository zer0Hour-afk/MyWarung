@extends('layouts.app')
@section('content')

<div class="dashboard-container">

    <div class="header-section">
        <div>
            <h1 class="page-title">Dashboard Overview</h1>
            <p class="page-subtitle">Selamat datang kembali di MyWarung-01!</p>
        </div>

        <div class="date-badge">
            {{ now()->format('d M Y') }}
        </div>
    </div>

    <div class="stats-grid">

        <div class="stat-card card-orange">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
            </div>
            <div class="stat-content">
                <h3>{{ $totalBarang }}</h3>
                <p>Total Barang</p>
            </div>
        </div>

        <div class="stat-card card-purple">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                    <line x1="7" y1="7" x2="7.01" y2="7"></line>
                </svg>
            </div>
            <div class="stat-content">
                <h3>{{ $totalKategori }}</h3>
                <p>Kategori Aktif</p>
            </div>
        </div>

        <div class="stat-card card-green">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 12h20"></path>
                    <path d="M12 2v20"></path>
                    <path d="M12 8h4a2 2 0 0 1 0 4h-4v-4Z"></path>
                </svg>
            </div>
            <div class="stat-content">
                <h3>{{ $totalSatuan }}</h3>
                <p>Jenis Satuan</p>
            </div>
        </div>

    </div>

    <div class="section-divider">
        <h2>Aksi Cepat</h2>
    </div>

    <div class="actions-grid">
        <button class="action-btn">
            <span>+</span> Tambah Barang
        </button>

        <button class="action-btn secondary">
            Lihat Laporan
        </button>
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

    --text-dark: #f4f4f4;
    --text-grey: #8a8a99;
    --bg-card: #15151a;
    --bg-border: #2e2e38;
}

.dashboard-container {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    max-width: 1200px;
    margin: 0 auto;
    padding: 1rem;
    color: var(--text-dark);
}

.header-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2.5rem;
}

.page-title {
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--primary-purple); /* Changed to Purple */
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.page-subtitle {
    color: var(--text-grey);
    margin: 0.5rem 0 0 0;
    font-size: 1rem;
}

.date-badge {
    background: var(--bg-card);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--primary-green);
    box-shadow: 0 0 10px rgba(57, 255, 20, 0.1);
    border: 1px solid var(--primary-green);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.stat-card {
    background: var(--bg-card);
    border-radius: 16px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.5);
    border: 1px solid var(--bg-border);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    cursor: default;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(125, 82, 190, 0.1); /* Purple Glow */
    border-color: var(--primary-purple);
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.stat-icon svg {
    width: 24px;
    height: 24px;
}

.stat-content h3 {
    font-size: 1.8rem;
    font-weight: 800;
    margin: 0;
    line-height: 1.2;
    color: var(--text-dark);
}

.stat-content p {
    margin: 0;
    font-size: 0.9rem;
    color: var(--text-grey);
    font-weight: 500;
    text-transform: uppercase;
}

.card-orange .stat-icon {
    background: var(--primary-orange-light);
    color: var(--primary-orange);
}

.card-purple .stat-icon { /* Formerly Blue */
    background: var(--primary-purple-light);
    color: var(--primary-purple);
}

.card-green .stat-icon {
    background: var(--primary-green-light);
    color: var(--primary-green);
}

.section-divider h2 {
    font-size: 1.2rem;
    color: var(--text-dark);
    margin-bottom: 1rem;
    font-weight: 700;
    border-left: 3px solid var(--primary-orange);
    padding-left: 10px;
}

.actions-grid {
    display: flex;
    gap: 1rem;
}

.action-btn {
    padding: 0.8rem 1.5rem;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
    background: var(--primary-purple);
    color: white;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.action-btn:hover {
    opacity: 0.9;
    transform: scale(1.02);
    box-shadow: 0 0 15px rgba(125, 82, 190, 0.4);
}

.action-btn.secondary {
    background: transparent;
    color: var(--primary-green);
    border: 1px solid var(--primary-green);
}

.action-btn.secondary:hover {
    background: var(--primary-green-light);
    color: var(--primary-green);
}

</style>
@endsection