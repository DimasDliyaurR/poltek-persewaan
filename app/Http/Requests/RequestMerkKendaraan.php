<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestMerkKendaraan extends FormRequest
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
                "mk_foto" => "image|extensions:jpg,png",
                "mk_merk" => "required",
                "mk_seri" => "required|",
                "mk_tarif" => "required|numeric|max_digits:10",
                "mk_kapasitas" => "required",
                "mk_bahan_bakar" => "required",
                "mk_deskripsi" => "required",
                "is_dp" => "boolean",
                "tarif_dp" => "numeric",
            ];
        }

        return [
            "mk_foto" => "required|image|extensions:jpg,png",
            "mk_merk" => "required",
            "mk_seri" => "required|",
            "mk_tarif" => "required|numeric|max_digits:10",
            "mk_kapasitas" => "required",
            "mk_bahan_bakar" => "required",
            "mk_deskripsi" => "required",
            "is_dp" => "boolean",
            "tarif_dp" => "required|numeric",
        ];
    }



    public function messages()
    {
        return [
            // Foto Kendaraan
            "mk_foto.required" => "Foto Kendaraan mohon diisi !",
            "mk_foto.image" => "Foto Kendaraan tidak berupa gambar !",
            "mk_foto.extensions" => "Foto Kendaraan gunakan extension jpg , png !",

            // Nama Merek
            "mk_merk.required" => "Nama Merek mohon diisi !",

            // Nama  Seri
            "mk_seri.required" => "Nama Series mohon diisi !",

            // Tarif Harga
            "mk_tarif.required" => "Tarif Harga mohon diisi !",
            "mk_tarif.numeric" => "Tarif Harga mohon diisi dengan angka !",
            "mk_tarif.max_digits" => "Tarif Harga terlalu panjang",

            "mk_kapasitas.required" => "Kapasitas mohon diisi!",
            "mk_bahanbakar.required" => "Bahan bakar mohon diisi!",
            "mk_deskripsi.required" => "Deskripsi mohon diisi !",

            "is_dp.boolean" => "Mohon isi dengan valid !",

            "tarif_dp.required" => "tarif dp mohon diisi !",
            "tarif_dp.numeric" => "Mohon isi berupa angka !",
        ];
    }
}
