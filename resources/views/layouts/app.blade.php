<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelontong App</title>
    
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
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        nav {
            background-color: var(--color-bg-light);
            padding: 1rem 2rem;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.5);
            border-bottom: 2px solid var(--color-accent);
        }
        
        nav div:first-child a {
            color: var(--color-success);
            text-decoration: none;
            font-weight: bold;
            font-size: 1.3rem;
            text-shadow: 0 0 5px rgba(57, 255, 20, 0.3);
        }

        nav a {
            color: var(--color-text);
            text-decoration: none;
            margin-left: 1rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        nav a:hover {
            color: var(--color-success);
            text-decoration: none;
        }

        .container {
            max-width: 1000px;
            margin: 2rem auto;
            background: var(--color-bg-light);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.5);
            border: 1px solid var(--color-border);
        }

        h1, h2, h3, h4, h5 {
            color: var(--color-accent);
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
            border: none;
            cursor: pointer;
            text-align: center;
        }
        .btn-primary { background-color: var(--color-accent); color: white; }
        .btn-warning { background-color: #ff9900; color: #1a1a1a; } 
        .btn-danger { background-color: var(--color-danger); color: white; }
        .btn-primary:hover { background-color: var(--color-accent-dark); }
        .btn-warning:hover { background-color: #cc7a00; }
        .btn-danger:hover { background-color: #b30000; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
            background-color: #0f0f12;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--color-border);
            text-align: left;
        }
        th {
            background-color: var(--color-accent);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
        }
        tr {
            transition: background-color 0.2s ease;
        }
        tr:hover {
            background-color: #1e1e24;
        }
        tr:last-child td {
            border-bottom: none;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }
        label {
            font-weight: 500;
            display: block;
            margin-bottom: 0.4rem;
            color: #eee;
        }
        input[type="text"], 
        input[type="email"], 
        input[type="number"], 
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid var(--color-border);
            background-color: #0f0f12;
            color: var(--color-success);
            box-sizing: border-box; 
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input[type="text"]:focus, 
        input[type="email"]:focus, 
        input[type="number"]:focus, 
        textarea:focus {
            border-color: var(--color-success);
            box-shadow: 0 0 0 3px rgba(57, 255, 20, 0.2);
            outline: none;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 5px;
            color: #1a1a1a;
            font-weight: 600;
        }
        .alert-success { background-color: var(--color-success); }
        .alert-danger { background-color: var(--color-danger); color: white; }

        footer {
            text-align: center;
            margin-top: 3rem;
            padding: 1.5rem;
            font-size: 0.9rem;
            color: var(--color-text-muted);
            border-top: 1px solid var(--color-border);
        }
    </style>
</head>
<body>
    <nav>
        <div>
            <a href="{{ route('dashboard') }}">
                ⬢ MyWarung-01
            </a>
        </div>
        <div>
            <a href="{{ url('/kategori') }}">Kategori</a>
            <a href="{{ url('/satuan') }}">Satuan</a>
            <a href="{{ url('/barang') }}">Barang</a>
            <a href="{{ url('/pemasok') }}">Pemasok</a>
        </div>
    </nav>

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
        SYSTEM.VER.2.0 // COPYRIGHT &copy; {{ date('Y') }} MyWarung-01
    </footer>
</body>
</html>