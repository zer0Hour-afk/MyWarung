<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyWarung</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #0b0b10; color: #e0e0e0; font-family: sans-serif; }
        .card { background-color: #15151a; border: 1px solid #7d52be; box-shadow: 0 0 20px rgba(125, 82, 190, 0.2); }
        .input-field { background-color: #0b0b10; border: 1px solid #2e2e38; color: white; transition: 0.3s; }
        .input-field:focus { border-color: #39ff14; outline: none; box-shadow: 0 0 8px rgba(57, 255, 20, 0.3); }
        .btn-primary { background-color: #7d52be; color: white; transition: 0.3s; }
        .btn-primary:hover { background-color: #5a329e; box-shadow: 0 0 15px rgba(125, 82, 190, 0.5); }
        .link-text { color: #39ff14; text-decoration: none; font-weight: bold; }
        .link-text:hover { text-decoration: underline; text-shadow: 0 0 5px #39ff14; }
        .forgot-link { font-size: 0.75rem; color: #888; text-decoration: none; transition: 0.3s; }
        .forgot-link:hover { color: #e0e0e0; }
    </style>
</head>
<body class="flex items-center justify-center h-screen">

    <div class="card p-8 rounded-lg shadow-xl w-96">
        <h2 class="text-2xl font-bold text-center mb-6 text-white tracking-wider">SYSTEM LOGIN</h2>

        @if(session('success'))
            <div class="bg-green-900/30 text-green-400 p-3 rounded mb-4 text-center text-sm border border-green-600">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-900/30 text-red-400 p-3 rounded mb-4 text-sm border border-red-600">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block mb-2 text-sm text-gray-400">Nama Pengguna</label>
                <input type="text" name="nama_pengguna" class="input-field w-full p-2 rounded" required autofocus>
            </div>

            <div class="mb-2">
                <label class="block mb-2 text-sm text-gray-400">Kata Sandi</label>
                <input type="password" name="kata_sandi" class="input-field w-full p-2 rounded" required>
            </div>

            {{-- LINK LUPA PASSWORD --}}
            <div class="flex justify-end mb-6">
                <a href="{{ route('password.forgot') }}" class="forgot-link">
                    Lupa Password?
                </a>
            </div>

            <button type="submit" class="btn-primary w-full font-bold py-2 px-4 rounded mb-4 tracking-wide">
                MASUK
            </button>

            <div class="text-center text-sm text-gray-500">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="link-text">Buat Akun Baru</a>
            </div>
        </form>
        
        <p class="text-center text-xs text-gray-700 mt-6">SYSTEM.VER.2.0</p>
    </div>

</body>
</html>