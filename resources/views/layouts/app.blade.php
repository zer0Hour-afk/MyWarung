<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NERV | MyWarung-01</title>
    <!-- Pengigat hanya kategori saja yang masih berfungsi -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --eva-bg-dark: #0b0b0f;      
            --eva-bg-panel: #15151a;      
            --eva-border: #2a2a35;        
            
            --eva-purple: #734CA6;        
            --eva-purple-dark: #573880;
            --eva-green: #39ff14;         
            --eva-orange: #ff9900;        
            --text-main: #eeeeee;
            --text-muted: #8f8f9d;
            
            --state-success: #39ff14;     /
            --state-danger: #e74c3c;
        }

        body {
            font-family: 'Inter', sans-serif; 
            background-color: var(--eva-bg-dark);
            color: var(--text-main);
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-image: 
                linear-gradient(rgba(57, 255, 20, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(57, 255, 20, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        h1, h2, h3, h4, h5, .brand-logo, nav a {
            font-family: 'Rajdhani', sans-serif; /* Font judul techy */
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        h1, h2, h3 {
            color: var(--eva-purple);
            border-left: 4px solid var(--eva-green);
            padding-left: 12px;
        }

        nav {
            background-color: rgba(21, 21, 26, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid var(--eva-purple);
            box-shadow: 0 4px 20px rgba(115, 76, 166, 0.2);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .brand-logo {
            color: var(--eva-green);
            text-decoration: none;
            font-weight: 700;
            font-size: 1.6rem;
            text-shadow: 0 0 8px rgba(57, 255, 20, 0.4);
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            margin-left: 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--eva-purple);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: var(--eva-green);
            transition: width 0.3s ease;
        }
        .nav-links a:hover::after {
            width: 100%;
        }

        .container {
            max-width: 1100px;
            margin: 3rem auto;
            background: var(--eva-bg-panel);
            padding: 2.5rem;
            clip-path: polygon(
                0 0, 
                100% 0, 
                100% calc(100% - 20px), 
                calc(100% - 20px) 100%, 
                0 100%
            );
            border-left: 2px solid var(--eva-purple);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            position: relative;
            clip-path: polygon(10px 0, 100% 0, 100% calc(100% - 10px), calc(100% - 10px) 100%, 0 100%, 0 10px);
        }

        .btn-primary {
            background-color: var(--eva-purple);
            color: white;
            border: 1px solid transparent;
        }
        .btn-primary:hover {
            background-color: var(--eva-purple-dark);
            box-shadow: 0 0 15px rgba(115, 76, 166, 0.6);
            border: 1px solid var(--eva-green);
        }

        .btn-warning {
            background-color: transparent;
            border: 1px solid var(--eva-orange);
            color: var(--eva-orange);
        }
        .btn-warning:hover {
            background-color: var(--eva-orange);
            color: black;
            box-shadow: 0 0 15px rgba(255, 153, 0, 0.4);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
            background-color: #0e0e12;
            border: 1px solid var(--eva-border);
        }

        th {
            background-color: rgba(115, 76, 166, 0.2); /* Transparent Purple */
            color: var(--eva-green);
            text-transform: uppercase;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid var(--eva-purple);
        }

        td {
            padding: 15px;
            border-bottom: 1px solid var(--eva-border);
            color: #d1d1d1;
        }

        tr:hover {
            background-color: rgba(57, 255, 20, 0.05); /* Slight green tint on hover */
        }

        label {
            font-family: 'Rajdhani', sans-serif;
            color: var(--eva-green);
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"], 
        input[type="email"], 
        input[type="number"], 
        textarea {
            width: 100%;
            padding: 12px;
            background-color: #0e0e12;
            border: 1px solid var(--eva-border);
            color: white;
            border-radius: 0; /* No radius for tech look */
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            transition: 0.3s;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--eva-green);
            box-shadow: 0 0 10px rgba(57, 255, 20, 0.2);
            background-color: #1a1a20;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid;
            background: rgba(255,255,255,0.05);
        }
        .alert-success {
            border-color: var(--eva-green);
            color: var(--eva-green);
            background: rgba(57, 255, 20, 0.1);
        }
        .alert-danger {
            border-color: var(--state-danger);
            color: var(--state-danger);
            background: rgba(231, 76, 60, 0.1);
        }

        footer {
            text-align: center;
            margin-top: 4rem;
            padding: 2rem;
            color: var(--text-muted);
            font-size: 0.8rem;
            border-top: 1px solid var(--eva-border);
            font-family: 'Rajdhani', sans-serif;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        
        @media (max-width: 768px) {
            .nav-links a {
                margin-left: 1rem;
                font-size: 0.9rem;
            }
            .container {
                padding: 1.5rem;
                margin: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div>
            <a href="{{ route('dashboard') }}" class="brand-logo">
                ⬢ MyWarung:01
            </a>
        </div>
        <div class="nav-links">
            <a href="{{ url('/kategori') }}">DATA.KATEGORI</a>
            <a href="{{ url('/satuan') }}">DATA.SATUAN</a>
            <a href="{{ url('/barang') }}">DATA.BARANG</a>
            <a href="{{ url('/pemasok') }}">LOG.PEMASOK</a>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                <strong>SYSTEM MSG:</strong> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                <strong>WARNING:</strong> {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>

    <footer>
        SYSTEM.VER.2.0 // COPYRIGHT &copy; {{ date('Y') }} MyWarung-01
    </footer>
</body>
</html>