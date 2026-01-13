<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - MyWarung</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #0b0b10; color: #e0e0e0; font-family: sans-serif; }
        .card { background-color: #15151a; border: 1px solid #39ff14; box-shadow: 0 0 20px rgba(57, 255, 20, 0.1); }
        .input-field { background-color: #0b0b10; border: 1px solid #2e2e38; color: white; transition: 0.3s; }
        .input-field:focus { border-color: #39ff14; outline: none; }
        .btn-success { background-color: #39ff14; color: #000; transition: 0.3s; font-weight: bold; }
        .btn-success:hover { background-color: #32d911; box-shadow: 0 0 15px rgba(57, 255, 20, 0.5); }
    </style>
</head>
<body class="flex items-center justify-center h-screen">

    <div class="card p-8 rounded-lg shadow-xl w-96">
        <h2 class="text-xl font-bold text-center mb-2 text-white">RESET PASSWORD</h2>
        <p class="text-center text-xs text-gray-400 mb-6">Silakan buat password baru untuk <b>{{ $user->nama_lengkap }}</b></p>

        @if ($errors->any())
            <div class="bg-red-900/30 text-red-400 p-3 rounded mb-4 text-xs border border-red-500">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('password.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="block mb-1 text-sm text-gray-400">Password Baru</label>
                <input type="password" name="kata_sandi" class="input-field w-full p-2 rounded" required autofocus>
            </div>

            <div class="mb-6">
                <label class="block mb-1 text-sm text-gray-400">Konfirmasi Password</label>
                <input type="password" name="kata_sandi_confirmation" class="input-field w-full p-2 rounded" required>
            </div>

            <button type="submit" class="btn-success w-full py-2 px-4 rounded mb-4">
                SIMPAN PASSWORD
            </button>
        </form>
    </div>

</body>
</html>