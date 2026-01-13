<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - MyWarung</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #0b0b10; color: #e0e0e0; font-family: sans-serif; }
        .card { background-color: #15151a; border: 1px solid #7d52be; box-shadow: 0 0 20px rgba(125, 82, 190, 0.2); }
        .input-field { background-color: #0b0b10; border: 1px solid #2e2e38; color: white; transition: 0.3s; }
        .input-field:focus { border-color: #39ff14; outline: none; box-shadow: 0 0 5px rgba(57, 255, 20, 0.3); }
        .btn-primary { background-color: #7d52be; color: white; transition: 0.3s; }
        .btn-primary:hover { background-color: #5a329e; box-shadow: 0 0 15px rgba(125, 82, 190, 0.5); }
        .link-back:hover { color: #39ff14; text-decoration: underline; }
    </style>
</head>
<body class="flex items-center justify-center h-screen">

    <div class="card p-8 rounded-lg shadow-xl w-96">
        <h2 class="text-xl font-bold text-center mb-2 text-white">VERIFIKASI AKUN</h2>
        <p class="text-center text-xs text-gray-400 mb-6">Masukkan data akun anda untuk reset password</p>

        @if ($errors->any())
            <div class="bg-red-900/30 text-red-400 p-3 rounded mb-4 text-xs border border-red-500">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('password.verify') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="block mb-1 text-sm text-gray-400">Username</label>
                <input type="text" name="nama_pengguna" class="input-field w-full p-2 rounded" required>
            </div>

            <div class="mb-3">
                <label class="block mb-1 text-sm text-gray-400">Email Terdaftar</label>
                <input type="email" name="email" class="input-field w-full p-2 rounded" required>
            </div>

            <div class="mb-6">
                <label class="block mb-1 text-sm text-gray-400">No. HP Terdaftar</label>
                <input type="text" name="telepon" class="input-field w-full p-2 rounded" required>
            </div>

            <button type="submit" class="btn-primary w-full font-bold py-2 px-4 rounded mb-4">
                VERIFIKASI
            </button>

            <div class="text-center text-sm">
                <a href="{{ route('login') }}" class="link-back text-gray-500">Kembali ke Login</a>
            </div>
        </form>
    </div>

</body>
</html>