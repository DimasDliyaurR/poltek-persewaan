<?php

namespace App\Http\Requests\kendaraan;

use Illuminate\Foundation\Http\FormRequest;

class RequestKendaraan extends FormRequest
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
        return [
            "merk_kendaraan_id" => "required",
            "k_plat" => "required|unique:kendaraans",
        ];
    }

    public function messages()
    {
        return [
            "merk_kendaraan_id.required" => "Merk Kendaraan Belum diisi",
            "k_plat.required" => "Plat Nomor Belum diisi",
            "k_plat.unique" => "Plat Nomor Sudah digunakan",
        ];
    }
}
