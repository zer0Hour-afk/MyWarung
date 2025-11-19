@extends('layouts.app')

@section('content')
<div class="nerv-dashboard">
    <!-- HEADER SECTION -->
    <div class="header-section">
        <div class="title-group">
            <div class="system-tag">WARUNG-SYSTEM : : CODE 01</div>
            <h1 class="page-title">DASHBOARD OVERVIEW</h1>
            <p class="page-subtitle">TERMINAL ACTIVE // SELAMAT DATANG KEMBALI.</p>
        </div>
        <div class="date-badge">
            <span class="label">SYNC DATE:</span>
            <span class="value">{{ now()->format('Y-m-d') }}</span>
        </div>
    </div>

    <!-- STATS GRID -->
    <div class="stats-grid">
        <!-- CARD 1: BARANG (Purple/Unit-01 Style) -->
        <div class="nerv-card card-purple">
            <div class="card-decoration top-right"></div>
            <div class="stat-icon">
                <!-- Icon Box -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">TOTAL.UNIT</div>
                <h3 class="stat-value">{{ $totalBarang ?? 0 }}</h3>
                <div class="stat-sub">LOG.BARANG</div>
            </div>
        </div>

        <div class="nerv-card card-green">
            <div class="card-decoration top-right"></div>
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">ACTIVE.CATS</div>
                <h3 class="stat-value">{{ $totalKategori ?? 0 }}</h3>
                <div class="stat-sub">DATA.KATEGORI</div>
            </div>
        </div>

        <!-- CARD 3: SATUAN (Orange/Warning Style) -->
        <div class="nerv-card card-orange">
            <div class="card-decoration top-right"></div>
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"></path><path d="M12 2v20"></path><path d="M12 8h4a2 2 0 0 1 0 4h-4v-4Z"></path></svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">METRICS</div>
                <h3 class="stat-value">{{ $totalSatuan ?? 0 }}</h3>
                <div class="stat-sub">TYPE.SATUAN</div>
            </div>
        </div>
    </div>

    <!-- ACTION SECTION -->
    <div class="section-divider">
        <div class="line"></div>
        <h2>COMMAND OPTIONS</h2>
        <div class="line"></div>
    </div>
    
    <div class="actions-grid">
        <!-- Menggunakan class .btn-primary dari Layout utama -->
        <button class="btn btn-primary">
            <span style="margin-right:10px;">[+]</span> INPUT BARANG
        </button>
        
        <!-- Menggunakan class .btn-warning dari Layout utama -->
        <button class="btn btn-warning">
            VIEW REPORTS
        </button>
    </div>
</div>

<style>
    /*
       Menggunakan variabel CSS dari Master Layout
    */

    .nerv-dashboard {
        /* Animasi masuk halus */
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* HEADER */
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 3rem;
        border-bottom: 1px solid var(--eva-border);
        padding-bottom: 1rem;
    }

    .system-tag {
        font-family: 'Rajdhani', sans-serif;
        font-size: 0.8rem;
        color: var(--eva-orange);
        letter-spacing: 2px;
        margin-bottom: 5px;
    }

    .page-title {
        font-size: 2.5rem;
        margin: 0;
        line-height: 1;
        /* Efek text glow */
        text-shadow: 0 0 10px rgba(115, 76, 166, 0.5);
    }

    .page-subtitle {
        color: var(--text-muted);
        font-family: 'Rajdhani', sans-serif;
        letter-spacing: 1px;
        margin-top: 5px;
        font-size: 0.9rem;
    }

    .date-badge {
        border: 1px solid var(--eva-green);
        background: rgba(57, 255, 20, 0.05);
        padding: 5px 15px;
        font-family: 'Rajdhani', sans-serif;
        font-weight: 700;
        display: flex;
        gap: 10px;
    }

    .date-badge .label { color: var(--eva-green); }
    .date-badge .value { color: #fff; letter-spacing: 2px; }

    /* CARDS GRID */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .nerv-card {
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid var(--eva-border);
        padding: 1.5rem;
        position: relative;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        transition: all 0.3s ease;
        
        /* Tech Shape Clip */
        clip-path: polygon(
            0 0, 
            100% 0, 
            100% calc(100% - 15px), 
            calc(100% - 15px) 100%, 
            0 100%
        );
    }

    .nerv-card:hover {
        background: rgba(255, 255, 255, 0.02);
        transform: translateX(5px);
    }

    .card-decoration {
        position: absolute;
        width: 20px;
        height: 20px;
        border-top: 2px solid;
        border-right: 2px solid;
        top: 0;
        right: 0;
        opacity: 0.5;
    }

    /* Card Colors Variants */
    .card-purple { border-left: 4px solid var(--eva-purple); }
    .card-purple .stat-icon { color: var(--eva-purple); border-color: var(--eva-purple); }
    .card-purple .card-decoration { border-color: var(--eva-purple); }
    
    .card-green { border-left: 4px solid var(--eva-green); }
    .card-green .stat-icon { color: var(--eva-green); border-color: var(--eva-green); }
    .card-green .card-decoration { border-color: var(--eva-green); }

    .card-orange { border-left: 4px solid var(--eva-orange); }
    .card-orange .stat-icon { color: var(--eva-orange); border-color: var(--eva-orange); }
    .card-orange .card-decoration { border-color: var(--eva-orange); }

    .stat-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid; /* Color comes from variant */
        background: rgba(0,0,0,0.2);
    }

    .stat-label {
        font-size: 0.7rem;
        letter-spacing: 1px;
        color: var(--text-muted);
    }

    .stat-value {
        font-family: 'Rajdhani', sans-serif;
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
        line-height: 1;
        color: #fff;
    }

    .stat-sub {
        font-size: 0.8rem;
        color: var(--text-muted);
        text-transform: uppercase;
        margin-top: 5px;
    }

    /* DIVIDER */
    .section-divider {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    
    .section-divider h2 {
        font-size: 1.2rem;
        color: var(--eva-green);
        margin: 0;
        white-space: nowrap;
        border: none; /* Reset default h2 border */
        padding: 0;
    }

    .section-divider .line {
        height: 1px;
        background: var(--eva-border);
        width: 100%;
    }

    .actions-grid {
        display: flex;
        gap: 1.5rem;
    }

    @media (max-width: 768px) {
        .header-section {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        .actions-grid {
            flex-direction: column;
        }
        .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>
@endsection