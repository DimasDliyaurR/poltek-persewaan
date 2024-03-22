<?php

namespace App\Http\Requests\kendaraan;

use App\Models\Kendaraan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestKendaraanUpdate extends FormRequest
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
        $kendaraan = $this->route();

        return [
            "merk_kendaraan_id" => "required",
            "k_plat" => [
                "required",
                Rule::unique('kendaraans', 'k_plat')->ignore($kendaraan->id),
            ],
        ];
    }

    public function messages()
    {
        return [
            "merk_kendaraan_id.required" => "Merk Kendaraan Belum diisi",
            "k_plat.required" => "Plat Nomor Belum diisi",
            "k_plat.unique" => "Plat Nomor :value Sudah digunakan",
        ];
    }
}
