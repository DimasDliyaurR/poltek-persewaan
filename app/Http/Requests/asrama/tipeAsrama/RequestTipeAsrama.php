<?php

namespace App\Http\Requests\asrama\tipeAsrama;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RequestTipeAsrama extends FormRequest
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
        $tipeAsrama = $this->route();
        if ($this->getMethod() != "PUT") {
            return [
                "ta_foto" => "required|image",
                "ta_nama" => "required|unique:tipe_asramas",
                "ta_tarif" => "required|numeric",
                "ta_kapasitas" => "required|numeric",
                "ta_deskripsi" => "required",
                "is_dp" => "required|boolean",
                "tarif_dp" => "required|numeric",
            ];
        } else {
            return [
                "ta_foto" => "image",
                "ta_nama" => ["required", Rule::unique("tipe_asramas", "ta_nama")->ignore($tipeAsrama->id)],
                "ta_tarif" => "required|numeric",
                "ta_kapasitas" => "required|numeric",
                "ta_deskripsi" => "required",
                "is_dp" => "required|boolean",
                "tarif_dp" => "required|numeric",
            ];
        }
    }

    public function messages()
    {
        return [
            "ta_foto.required" => "Foto mohon diisi !",
            "ta_foto.image" => "Foto mohon diisi berupa gambar !",

            "ta_nama.required" => "Nama mohon diisi !",
            "ta_nama.unique" => "Nama sudah digunakan !",

            "ta_tarif.required" => "Tarif mohon diisi !",
            "ta_tarif.numeric" => "Tarif mohon diisi menggunakan angka !",

            "ta_kapasitas.required" => "Kapasitas mohon diisi !",
            "ta_kapasitas.numeric" => "Kapasitas mohon diisi menggunakan angka !",

            "ta_deskripsi.required" => "Deskripsi mohon diisi !",

            "is_dp.boolean" => "Mohon isi dengan valid !",

            "tarif_dp.required" => "tarif dp mohon diisi !",
            "tarif_dp.numeric" => "Mohon isi berupa angka !",
        ];
    }
}
