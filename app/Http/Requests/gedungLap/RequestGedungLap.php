<?php

namespace App\Http\Requests\gedungLap;

use Illuminate\Foundation\Http\FormRequest;

class RequestGedungLap extends FormRequest
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
                "gl_foto" => "image",
                "gl_nama" => "required",
                "gl_keterangan" => "required",
                "gl_tarif" => "required|numeric",
                "gl_satuan_gedung" => "required",
                "gl_kapasitas_gedung" => "required|numeric",
                "gl_ukuran_gedung" => "required",
            ];
        } else {
            $rules += [
                "gl_foto" => "required|image",
                "gl_nama" => "required",
                "gl_keterangan" => "required",
                "gl_tarif" => "required|numeric",
                "gl_satuan_gedung" => "required",
                "gl_kapasitas_gedung" => "required|numeric",
                "gl_ukuran_gedung" => "required",
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            "gl_foto.required" => "Foto Gedung Lapangan mohon diisi !",
            "gl_foto.image" => "Foto Gudang Lapangan mohon diisi berupa gambar !",

            "gl_nama.required" => "Nama Gedung Lapangan mohon diisi !",
            "gl_keterangan.required" => "Keterangan mohon diisi !",
            "gl_tarif.required" => "Harga Tarif mohon diisi !",
            "gl_tarif.numeric" => "Harga Tarif mohon diisi menggunakan angka !",

            "gl_satuan_gedung.required" => "Satuan mohon diisi !",

            "gl_kapasitas_gedung.required" => "Kapasitas mohon diisi !",
            "gl_kapasitas_gedung.numeric" => "Kapasitas mohon diisi menggunakan angka !",

            "gl_ukuran_gedung.required" => "Ukuran mohon diisi !",
        ];
    }
}
