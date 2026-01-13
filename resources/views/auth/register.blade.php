<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #1a1a2e; color: #e0e0e0; font-family: sans-serif; }
        .card { background-color: #16213e; border: 1px solid #7d52be; }
        .input-field { background-color: #0f3460; border: 1px solid #533483; color: white; }
        .input-field:focus { border-color: #39ff14; outline: none; }
        .btn-primary { background-color: #e94560; color: white; }
        .btn-primary:hover { background-color: #c83e55; }
        .link-text { color: #39ff14; text-decoration: none; }
        .link-text:hover { text-decoration: underline; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen py-10">

    <div class="card p-8 rounded-lg shadow-xl w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-2 text-white">Buat Akun Baru</h2>
        <p class="text-center text-gray-400 mb-6 text-sm">Silakan isi data diri anda</p>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4 text-sm">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block mb-1 text-sm">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="input-field w-full p-2 rounded" value="{{ old('nama_lengkap') }}" required>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 text-sm">Username</label>
                    <input type="text" name="nama_pengguna" class="input-field w-full p-2 rounded" value="{{ old('nama_pengguna') }}" required>
                </div>
                <div>
                    <label class="block mb-1 text-sm">No. HP</label>
                    <input type="text" name="telepon" class="input-field w-full p-2 rounded" value="{{ old('telepon') }}" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm">Email</label>
                <input type="email" name="email" class="input-field w-full p-2 rounded" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm">Kata Sandi</label>
                <input type="password" name="kata_sandi" class="input-field w-full p-2 rounded" required>
            </div>

            <div class="mb-6">
                <label class="block mb-1 text-sm">Konfirmasi Kata Sandi</label>
                <input type="password" name="kata_sandi_confirmation" class="input-field w-full p-2 rounded" required>
            </div>

            <button type="submit" class="btn-primary w-full font-bold py-2 px-4 rounded transition mb-4">
                Daftar Sekarang
            </button>

            <div class="text-center text-sm">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="link-text">Login disini</a>
            </div>
        </form>
    </div>

</body>
</html>