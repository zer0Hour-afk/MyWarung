<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'kata_sandi' => 'required',
        ]);

        $pengguna = Pengguna::where('nama_pengguna', $request->nama_pengguna)->first();

        if ($pengguna && Hash::check($request->kata_sandi, $pengguna->kata_sandi)) {
            if ($pengguna->status_aktif) {
                Auth::login($pengguna);
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
            return back()->withErrors(['nama_pengguna' => 'Akun anda dinonaktifkan.']);
        }

        return back()->withErrors(['nama_pengguna' => 'Nama pengguna atau kata sandi salah.']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'nama_pengguna' => 'required|unique:pengguna,nama_pengguna|max:50',
            'email' => 'required|email|unique:pengguna,email',
            'telepon' => 'required|numeric',
            'kata_sandi' => 'required|min:4|confirmed',
        ]);

        Pengguna::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'kata_sandi' => Hash::make($request->kata_sandi),
            'peran' => 'admin',
            'status_aktif' => 1
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    public function showForgot()
    {
        return view('auth.forgot');
    }

    public function verifyForgot(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
        ]);

        $user = Pengguna::where('nama_pengguna', $request->nama_pengguna)
                        ->where('email', $request->email)
                        ->where('telepon', $request->telepon)
                        ->first();

        if ($user) {
            return redirect()->route('password.reset', $user->id);
        }

        return back()->withErrors(['error' => 'Data tidak cocok dengan database kami.']);
    }

    public function showReset($id)
    {
        $user = Pengguna::findOrFail($id);
        return view('auth.reset', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'kata_sandi' => 'required|min:4|confirmed',
        ]);

        $user = Pengguna::findOrFail($id);
        $user->kata_sandi = Hash::make($request->kata_sandi);
        $user->save();

        return redirect()->route('login')->with('success', 'Password berhasil direset! Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}