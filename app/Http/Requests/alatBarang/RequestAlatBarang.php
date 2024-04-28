<?php

namespace App\Http\Requests\alatBarang;

use Illuminate\Foundation\Http\FormRequest;

class RequestAlatBarang extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->level == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        if ($this->getMethod() == "PUT") {
            return [
                "ab_foto" => "image",
                "ab_nama" => "required",
                "ab_keterangan" => "required",
                "ab_tarif" => "required|numeric",
                "ab_qty" => "required|numeric",
                "satuan_alat_barang_id" => "required",
            ];
        } else {
            return [
                "ab_foto" => "required|image",
                "ab_nama" => "required",
                "ab_keterangan" => "required",
                "ab_tarif" => "required|numeric",
                "ab_qty" => "required|numeric",
                "satuan_alat_barang_id" => "required",
            ];
        }
    }

    public function messages()
    {
        return [
            "ab_foto.required" => "Foto mohon diisi !",
            "ab_foto.image" => "Foto mohon diisi berupa gambar !",
            "ab_nama.required" => "Nama Alat Barang mohon diisi !",
            "ab_keterangan.required" => "Keterangan mohon diisi !",
            "ab_tarif.required" => "Harga Tarif mohon diisi !",
            "ab_tarif.numeric" => "Harga Tarif mohon diisi menggunakan angka !",
            "ab_qty.required" => "Jumlah Unit mohon diisi !",
            "ab_qty.numeric" => "Jumlah Unit mohon diisi menggunakan angka !",
            "ab_satuan.required" => "Satuan mohon diisi !",
        ];
    }
}
