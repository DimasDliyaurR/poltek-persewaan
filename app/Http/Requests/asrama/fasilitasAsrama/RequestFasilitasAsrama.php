<?php

namespace App\Http\Requests\asrama\fasilitasAsrama;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestFasilitasAsrama extends FormRequest
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
        $fasilitasAsrama = $this->route();

        return [
            "fa_icon" => "required",
            "fa_nama" => [
                "required",
                "unique" => Rule::unique("fasilitas_asramas", "fa_nama")->ignore($fasilitasAsrama->id)
            ],
            "fa_tarif" => "required|numeric",
        ];
    }

    public function messages()
    {
        return [
            "fa_icon.required" => "Icon mohon diisi !",
            "fa_nama.required" => "Fasilitas Asrama mohon diisi !",
            "fa_nama.unique" => "Fasilitas Asrama sudah ada !",
            "fa_tarif.required" => "Tarif Fasilitas Asrama mohon diisi !",
            "fa_tarif.numeric" => "Tarif Fasilitas Asrama mohon diisi menggunakan angka",
        ];
    }
}
