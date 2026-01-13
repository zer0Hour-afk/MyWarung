@extends('layouts.app')

@section('content')
<div class="nerv-panel">
    <div class="header-section">
        <div>
            <div class="system-tag">USER.SYSTEM // PROFILE_CONFIG</div>
            <h2 class="page-title">PROFIL PENGGUNA</h2>
        </div>
    </div>

    @if(session('success'))
        <div class="alert-success mb-4 p-3 bg-green-900 text-green-200 border border-green-500 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-grid">
        @csrf
        @method('PUT')

        {{-- Kartu Foto & Info Utama --}}
        <div class="profile-card">
            <div class="avatar-section">
                @if(Auth::user()->foto_profil)
                    <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="Profile" class="avatar-img">
                @else
                    <div class="avatar-placeholder">
                        {{ substr(Auth::user()->nama_lengkap, 0, 1) }}
                    </div>
                @endif
                
                <div class="mt-4 text-center">
                    <label for="foto_profil" class="btn-upload">
                        Ganti Foto
                    </label>
                    <input type="file" id="foto_profil" name="foto_profil" class="hidden-input" onchange="this.form.submit()">
                </div>
            </div>

            <div class="info-badges">
                <div class="badge-role">
                    ROLE: {{ strtoupper(Auth::user()->peran) }}
                </div>
                <div class="badge-status">
                    STATUS: AKTIF
                </div>
            </div>
        </div>

        {{-- Form Edit Data --}}
        <div class="form-card">
            <h3 class="section-title">EDIT INFORMASI</h3>
            
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" class="nerv-input">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="nerv-input">
            </div>

            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon', $user->telepon) }}" class="nerv-input">
            </div>

            <h3 class="section-title mt-6">GANTI PASSWORD (OPSIONAL)</h3>
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="kata_sandi" class="nerv-input" placeholder="Biarkan kosong jika tidak ingin mengganti">
            </div>
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="kata_sandi_confirmation" class="nerv-input">
            </div>

            <div class="mt-6 text-right">
                <button type="submit" class="btn-save">SIMPAN PERUBAHAN</button>
            </div>
        </div>
    </form>
</div>

<style>
    .profile-grid { display: grid; grid-template-columns: 1fr 2fr; gap: 2rem; }
    @media(max-width: 768px) { .profile-grid { grid-template-columns: 1fr; } }

    .profile-card, .form-card {
        background: #15151a; border: 1px solid #7d52be; padding: 2rem; border-radius: 8px;
    }

    .avatar-section { display: flex; flex-direction: column; align-items: center; margin-bottom: 2rem; }
    .avatar-img { width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 3px solid #39ff14; box-shadow: 0 0 15px rgba(57, 255, 20, 0.3); }
    .avatar-placeholder { width: 150px; height: 150px; border-radius: 50%; background: #2e2e38; display: flex; align-items: center; justify-content: center; font-size: 4rem; color: #7d52be; border: 3px solid #7d52be; }

    .info-badges { text-align: center; display: flex; flex-direction: column; gap: 10px; }
    .badge-role { background: rgba(125, 82, 190, 0.2); color: #c084fc; padding: 5px 10px; border: 1px solid #7d52be; letter-spacing: 2px; font-weight: bold; }
    .badge-status { background: rgba(57, 255, 20, 0.1); color: #39ff14; padding: 5px 10px; border: 1px solid #39ff14; letter-spacing: 2px; font-weight: bold; }

    .nerv-input { width: 100%; background: #0e0e12; border: 1px solid #444; color: white; padding: 10px; margin-top: 5px; outline: none; }
    .nerv-input:focus { border-color: #39ff14; }
    .form-group { margin-bottom: 1rem; }
    .form-group label { color: #888; font-size: 0.9rem; }

    .btn-upload { background: #333; color: white; padding: 5px 15px; cursor: pointer; border: 1px solid #555; font-size: 0.9rem; transition: 0.3s; }
    .btn-upload:hover { border-color: #39ff14; color: #39ff14; }
    .hidden-input { display: none; }
    .btn-save { background: #7d52be; color: white; border: none; padding: 10px 20px; font-weight: bold; cursor: pointer; transition: 0.3s; }
    .btn-save:hover { background: #5b3a91; box-shadow: 0 0 10px rgba(125, 82, 190, 0.5); }
    
    .section-title { color: #39ff14; font-family: 'Rajdhani', sans-serif; letter-spacing: 1px; margin-bottom: 1rem; border-bottom: 1px solid #333; padding-bottom: 5px; }
    
    .nerv-panel { max-width: 1000px; margin: 0 auto; padding: 2rem; }
    .header-section { margin-bottom: 2rem; border-bottom: 1px solid #444; padding-bottom: 1rem; }
    .system-tag { color: #39ff14; font-size: 0.7rem; letter-spacing: 2px; margin-bottom: 5px; }
    .page-title { margin: 0; font-size: 2rem; color: #7d52be; font-weight: 800; }
</style>
@endsection