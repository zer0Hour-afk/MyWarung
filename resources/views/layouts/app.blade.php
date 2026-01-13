<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyWarung-01 System</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --color-bg-dark: #0b0b10;
            --color-bg-light: #15151a;
            --color-border: #2e2e38;
            --color-text: #f4f4f4;
            --color-text-muted: #8a8a99;
            --color-accent: #7d52be;    
            --color-accent-dark: #5a329e;
            --color-success: #39ff14;    
            --color-danger: #e90000;     
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: var(--color-bg-dark);
            color: var(--color-text);
            margin: 0; padding: 0;
            line-height: 1.6;
        }

        nav {
            background-color: var(--color-bg-light);
            height: 70px;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid var(--color-accent);
            box-shadow: 0 4px 20px rgba(0,0,0,0.6);
            position: sticky; top: 0; z-index: 100;
            backdrop-filter: blur(10px);
        }

        .nav-brand {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--color-success);
            text-decoration: none;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(57, 255, 20, 0.3);
            transition: 0.3s;
        }
        .nav-brand:hover {
            text-shadow: 0 0 20px rgba(57, 255, 20, 0.8);
            color: #fff;
        }

        .nav-center {
            display: flex;
            gap: 5px;
            height: 100%;
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            height: 100%;
            padding: 0 15px;
            color: var(--color-text-muted);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
        }

        .nav-link:hover {
            color: #fff;
            text-shadow: 0 0 8px rgba(255,255,255,0.6);
            background: rgba(255,255,255,0.02);
        }

        .nav-link.active {
            color: var(--color-accent);
            border-bottom: 3px solid var(--color-accent);
            background: linear-gradient(to top, rgba(125, 82, 190, 0.15), transparent);
            text-shadow: 0 0 10px rgba(125, 82, 190, 0.4);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
            padding-left: 20px;
            border-left: 1px solid var(--color-border);
            height: 40px;
        }

        .user-info { text-align: right; line-height: 1.2; }
        .user-name { display: block; font-weight: bold; font-size: 0.9rem; color: white; }
        .user-role { display: block; font-size: 0.7rem; color: var(--color-success); font-weight: bold; letter-spacing: 1px; }

        .profile-pic {
            width: 40px; height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--color-success);
            transition: 0.3s;
            cursor: pointer;
        }
        .profile-pic:hover { box-shadow: 0 0 15px var(--color-success); transform: scale(1.05); }

        .profile-placeholder {
            width: 40px; height: 40px;
            border-radius: 50%;
            background: var(--color-accent);
            color: white;
            display: flex; align-items: center; justify-content: center;
            font-weight: bold;
            border: 2px solid var(--color-success);
            font-size: 1.2rem;
            transition: 0.3s;
        }
        .profile-placeholder:hover { box-shadow: 0 0 15px var(--color-accent); }

        .btn-logout {
            background: none; border: none;
            color: #666; font-size: 1.4rem;
            cursor: pointer; transition: 0.3s;
            display: flex; align-items: center;
            padding: 0 5px;
        }
        .btn-logout:hover { color: var(--color-danger); text-shadow: 0 0 10px var(--color-danger); transform: scale(1.1); }

        .container {
            max-width: 1100px;
            margin: 2rem auto;
            background: var(--color-bg-light);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 30px rgba(0,0,0,0.5);
            border: 1px solid var(--color-border);
            min-height: 60vh;
        }

        h1, h2, h3, h4, h5 { color: var(--color-accent); font-family: 'Rajdhani', sans-serif; }
        
        .btn {
            display: inline-block; padding: 10px 20px; border-radius: 4px;
            text-decoration: none; font-size: 0.9rem; font-weight: 600;
            transition: all 0.2s; border: none; cursor: pointer; text-align: center;
            text-transform: uppercase; letter-spacing: 1px;
        }
        .btn-primary { background-color: var(--color-accent); color: white; }
        .btn-warning { background-color: #ff9900; color: #1a1a1a; } 
        .btn-danger { background-color: transparent; border: 1px solid var(--color-danger); color: var(--color-danger); }
        
        .btn-primary:hover { background-color: var(--color-accent-dark); box-shadow: 0 0 15px rgba(125, 82, 190, 0.4); }
        .btn-warning:hover { background-color: #cc7a00; }
        .btn-danger:hover { background-color: var(--color-danger); color: white; }

        table { width: 100%; border-collapse: collapse; margin-top: 1.5rem; background-color: #0f0f12; }
        th, td { padding: 12px 15px; border-bottom: 1px solid var(--color-border); text-align: left; }
        th { background-color: var(--color-accent); color: white; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; }
        tr:hover { background-color: #1e1e24; }

        .form-group { margin-bottom: 1.2rem; }
        label { display: block; margin-bottom: 0.5rem; color: #ccc; font-size: 0.9rem; }
        input, select, textarea {
            width: 100%; padding: 10px; border-radius: 4px;
            border: 1px solid var(--color-border);
            background-color: #0b0b10; color: white;
            box-sizing: border-box; 
        }
        input:focus, select:focus, textarea:focus {
            border-color: var(--color-success);
            box-shadow: 0 0 5px rgba(57, 255, 20, 0.3); outline: none;
        }

        .alert { padding: 1rem; margin-bottom: 1.5rem; border-radius: 4px; font-weight: 600; }
        .alert-success { background: rgba(57, 255, 20, 0.1); border: 1px solid var(--color-success); color: var(--color-success); }
        .alert-danger { background: rgba(233, 0, 0, 0.1); border: 1px solid var(--color-danger); color: var(--color-danger); }

        footer {
            text-align: center; margin-top: 3rem; padding: 2rem;
            font-size: 0.8rem; color: #444; letter-spacing: 2px;
            font-family: 'Rajdhani', sans-serif;
        }
    </style>
</head>
<body>

    {{-- NAVIGASI UTAMA --}}
    <nav>
        {{-- LOGO --}}
        <a href="{{ route('dashboard') }}" class="nav-brand">
            ⬢ MyWarung-01
        </a>

        {{-- MENU TENGAH (DENGAN LOGIKA AKTIF) --}}
        <div class="nav-center">
            <a href="{{ route('kategori.index') }}" class="nav-link {{ Request::is('kategori*') ? 'active' : '' }}">
                Kategori
            </a>
            <a href="{{ route('satuan.index') }}" class="nav-link {{ Request::is('satuan*') ? 'active' : '' }}">
                Satuan
            </a>
            <a href="{{ route('barang.index') }}" class="nav-link {{ Request::is('barang*') ? 'active' : '' }}">
                Barang
            </a>
            <a href="{{ route('pemasok.index') }}" class="nav-link {{ Request::is('pemasok*') ? 'active' : '' }}">
                Pemasok
            </a>
        </div>

        {{-- KANAN: PROFIL & LOGOUT --}}
        <div class="nav-right">
            <div class="user-info">
                <span class="user-name">{{ Auth::user()->nama_lengkap }}</span>
                <span class="user-role">{{ strtoupper(Auth::user()->peran) }}</span>
            </div>

            <a href="{{ route('profile.index') }}" title="Edit Profil" style="text-decoration: none;">
                @if(Auth::user()->foto_profil)
                    <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" class="profile-pic">
                @else
                    <div class="profile-placeholder">
                        {{ substr(Auth::user()->nama_lengkap, 0, 1) }}
                    </div>
                @endif
            </a>

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout" title="Keluar Sistem">
                    ⏻
                </button>
            </form>
        </div>
    </nav>

    {{-- KONTEN HALAMAN --}}
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>

    <footer>
        SYSTEM.VER.2.0 // COPYRIGHT &copy; {{ date('2025') }} MyWarung-01
    </footer>

</body>
</html>