<?php

namespace App\Http\Requests\asrama\fasilitasAsrama;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            "fa_icon" => "required",
            "fa_nama" => "required",
        ];
    }

    public function messages()
    {
        return [
            "fa_icon.required" => "Icon belum diisi",
            "fa_nama.required" => "Fasilitas Asrama belum diisi",
        ];
    }
}
