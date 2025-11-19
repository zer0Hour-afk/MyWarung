<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKategoriRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Dapatkan ID kategori dari route
        $kategoriId = $this->route('kategori')->id;

        return [
            // nama unik
            'nama' => [
                'required',
                'string',
                'max:100',
                Rule::unique('kategori', 'nama')->ignore($kategoriId),
            ],
        ];
    }
}