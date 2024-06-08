<?php

namespace App\Http\Requests\kendaraan;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RequestKendaraan extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->level == 'admin_kendaraan' || auth()->user()->level == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $kendaraan = $this->route();

        if ($this->getMethod() == "PUT") {
            return [
                "merk_kendaraan_id" => "required",
                "k_plat" => [
                    "required",
                    Rule::unique('kendaraans', 'k_plat')->ignore($kendaraan->id),
                ],
                "k_urutan_prioritas" => "required|numeric",
            ];
        }
        return [
            "merk_kendaraan_id" => "required",
            "k_plat" => "required|unique:kendaraans",
            "k_urutan_prioritas" => "required|numeric",
        ];
    }

    public function messages()
    {
        return [
            "merk_kendaraan_id.required" => "Merk Kendaraan Belum diisi",
            "k_plat.required" => "Plat Nomor Belum diisi",
            "k_plat.unique" => "Plat Nomor Sudah digunakan",
            "k_urutan.required" => "Urutan mohon diisi !",
            "k_urutan.numeric" => "Urutan mohon diisi menggunakan angka !",
        ];
    }
}
