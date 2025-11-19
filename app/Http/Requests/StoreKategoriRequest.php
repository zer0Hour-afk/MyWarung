<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriRequest extends FormRequest
{
    /**
     * Tentukan apakah user boleh membuat request ini.
     * Ubah jadi true, 
     */
    public function authorize(): bool
    {
        return true; // Izinkan semua untuk saat ini
    }

    /**
     * Dapatkan aturan validasi.
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:100|unique:kategori,nama',
        ];
    }
}