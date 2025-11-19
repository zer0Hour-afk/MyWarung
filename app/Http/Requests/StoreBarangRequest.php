<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode_barcode' => 'nullable|string|max:50|unique:barang,kode_barcode',
            'nama_barang' => 'required|string|max:100',
            'id_kategori' => 'required|integer|exists:kategori,id', // Cek apakah id_kategori ada di tabel kategori
            'id_satuan' => 'required|integer|exists:satuan,id',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'id_pemasok' => 'required|integer|exists:pemasok,id',
            // id_pengguna biasanya didapat dari user yang login
            // 'id_pengguna' => 'required|integer|exists:pengguna,id', 
        ];
    }
}