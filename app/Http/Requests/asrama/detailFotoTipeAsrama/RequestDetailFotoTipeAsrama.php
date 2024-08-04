<?php

namespace App\Http\Requests\asrama\detailFotoTipeAsrama;

use Illuminate\Foundation\Http\FormRequest;

class RequestDetailFotoTipeAsrama extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (auth()->user()->level == 'admin_asrama' || auth()->user()->level == "admin") && auth()->user()->level;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "dfta_foto" => "required|image|dimensions:max_width=1800,max_height=1800",
        ];
    }

    public function messages()
    {
        return [
            "dfta_foto.required" => "Foto mohon diisi !",
            "dfta_foto.image" => "Foto mohon diisi berupa gambar !",
        ];
    }
}
