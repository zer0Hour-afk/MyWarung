<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBarangRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Dapatkan ID kategori dari route (misal: /kategori/5)
        $kategoriId = $this->route('barang')->id;

        return [
            // nama harus unik, tapi abaikan unik untuk dirinya sendiri
            'nama' => [
                'required',
                'string',
                'max:100',
                Rule::unique('barang', 'nama')->ignore($barangId),
            ],
        ];
    }
}