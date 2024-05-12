<?php

namespace App\Http\Requests\layanan;

use Illuminate\Foundation\Http\FormRequest;

class RequestLayanan extends FormRequest
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
                "l_foto" => "image",
                "l_nama" => "required",
                "l_tarif" => "required|numeric",
                "l_satuan" => "required",
                "l_deskripsi" => "required",
                "is_dp" => "boolean",
            ];
        } else {
            return [
                "l_foto" => "required|image",
                "l_nama" => "required",
                "l_tarif" => "required|numeric",
                "l_satuan" => "required",
                "l_deskripsi" => "required",
                "is_dp" => "boolean",
            ];
        }
    }

    public function messages()
    {
        return [
            "l_foto.required" => "Foto Layanan mohon diisi !",
            "l_foto.image" => "Foto Layanan mohon diisi menggunakan gambar !",

            "l_nama.required" => "Nama Layanan mohon diisi !",

            "l_tarif.required" => "Harga Tarif mohon diisi !",
            "l_tarif.numeric" => "Harga Tarif mohon diisi menggunakan angka !",

            "l_satuan.required" => "Satuan mohon diisi !",

            "l_personil.required" => "Personil mohon diisi !",

            "l_deskripsi.required" => "Deskripsi mohon diisi !",

            "is_dp.boolean" => "Mohon isi dengan valid !",

            "tarif_dp.required" => "tarif dp mohon diisi !",
            "tarif_dp.numeric" => "Mohon isi berupa angka !",
        ];
    }
}
