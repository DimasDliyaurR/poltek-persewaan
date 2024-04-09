<?php

namespace App\Http\Requests\Promo;

use Illuminate\Foundation\Http\FormRequest;

class RequestPromo extends FormRequest
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
        if ($this->getMethod() == "PUT") {
            return [
                "p_judul" => "required",
                "p_foto" => "image",
                "p_kode" => "required",
                "p_isi" => "required|numeric",
                "p_tipe" => "required",
                "p_is_aktif" => "required|boolean",
                "p_is_umum" => "required|boolean",
                "p_deskripsi" => "required",
                "p_mulai" => "required|date",
                "p_kadaluarsa" => "required|date",
                "p_jumlah" => "numeric",

                "p_kategori" => "required",
            ];
        } else {
            return [
                "p_judul" => "required",
                "p_foto" => "required|image",
                "p_kode" => "required",
                "p_isi" => "required|numeric",
                "p_tipe" => "required",
                "p_is_aktif" => "required|boolean",
                "p_is_umum" => "required|boolean",
                "p_deskripsi" => "required",
                "p_mulai" => "required|date",
                "p_kadaluarsa" => "required|date",
                "p_jumlah" => "numeric",
                "p_kategori" => "required",
            ];
        }
    }

    public function messages()
    {
        return [
            "p_judul.required" => "Judul mohon diisi !",

            "p_foto.required" => "Foto mohon diisi !",
            "p_foto.image" => "Foto mohon diisi berupa gambar !",

            "p_kode.required" => "Kode mohon diisi !",

            "p_isi.required" => "Isi mohon diisi !",
            "p_isi.numeric" => "Isi mohon diisi berupa angka !",

            "p_tipe.required" => "Tipe mohon diisi !",

            "p_is_aktif.required" => "Mohon Dipilih !",
            "p_is_umum.required" => "Mohon Dipilih !",

            "p_deskripsi.required" => "Deskripsi mohon diisi !",

            "p_mulai.required" => "Mulai promo mohon diisi !",
            "p_mulai.date" => "Mulai promo mohon diisi menggunakan format date !",

            "p_kadaluarsa.required" => "Kadaluarsa mohon diisi !",
            "p_kadaluarsa.date" => "Kadaluarsa mohon diisi menggunakan format date !",

            // "p_jumlah.required" => "Jumlah mohon diisi !",
            "p_jumlah.numeric" => "Jumlah mohon diisi menggunakan angka !",

            "p_kategori.required" => "Kategori mohon diisi !",
        ];
    }
}
