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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "mk_foto" => "required|image|extensions:jpg,png",
            "mk_merk" => "required",
            "mk_seri" => "required",
            "mk_tarif" => "required|numeric|max:8",
            "mk_kapasitas" => "required",
            "mk_bahanbakar" => "required",
            "mk_deskripsi" => "required",
        ];
    }

    public function messages()
    {
        return [
            // Foto Kendaraan
            "mk_foto.required" => "Foto Kendaraan belum diisi !",
            "mk_foto.image" => "Foto Kendaraan tidak berupa gambar !",
            "mk_foto.extensions" => "Foto Kendaraan gunakan extension jpg , png !",

            // Nama Merek
            "mk_merk.required" => "Nama Merek mohon diisi !",

            // Nama  Seri
            "mk_seri.required" => "Nama Series mohon diisi !",

            // Tarif Harga
            "mk_tarif.required" => "Tarif Harga mohon diisi",
            "mk_tarif.numeric" => "Tarif Harga mohon diisi dengan angka",
            "mk_tarif.max" => "Tarif Harga hanya boleh diisi maksimal 8 karakter",

            "mk_kapasitas.required" => "Kapasitas belum diisi",
            "mk_bahanbakar.required" => "Bahan bakar belum diisi",
            "mk_deskripsi.required" => "Deskripsi belum diisi",
        ];
    }
}
