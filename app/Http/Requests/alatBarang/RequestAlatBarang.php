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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        if ($this->getMethod() == "PUT") {
            $rules += [
                "a_foto" => "image",
                "a_nama" => "required",
                "a_keterangan" => "required",
                "a_tarif" => "required|numeric",
                "a_qty" => "required|numeric",
                "satuan_alat_barang_id" => "required",
            ];
        } else {
            $rules += [
                "a_foto" => "required|image",
                "a_nama" => "required",
                "a_keterangan" => "required",
                "a_tarif" => "required|numeric",
                "a_qty" => "required|numeric",
                "satuan_alat_barang_id" => "required",
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            "a_foto.required" => "Foto mohon diisi !",
            "a_foto.image" => "Foto mohon diisi berupa gambar !",
            "a_nama.required" => "Nama Alat Barang mohon diisi !",
            "a_keterangan.required" => "Keterangan mohon diisi !",
            "a_tarif.required" => "Harga Tarif mohon diisi !",
            "a_tarif.numeric" => "Harga Tarif mohon diisi menggunakan angka !",
            "a_qty.required" => "Jumlah Unit mohon diisi !",
            "a_qty.numeric" => "Jumlah Unit mohon diisi menggunakan angka !",
            "a_satuan.required" => "Satuan mohon diisi !",
        ];
    }
}
