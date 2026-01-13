<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:pengguna,email,' . $user->id,
            'telepon' => 'required|string|max:20',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
            'kata_sandi' => 'nullable|min:4|confirmed',
        ]);

        if ($request->hasFile('foto_profil')) {
            if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
                Storage::disk('public')->delete($user->foto_profil);
            }

            $path = $request->file('foto_profil')->store('profiles', 'public');
            $user->foto_profil = $path;
        }

        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->telepon = $request->telepon;

        if ($request->filled('kata_sandi')) {
            $user->kata_sandi = Hash::make($request->kata_sandi);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}