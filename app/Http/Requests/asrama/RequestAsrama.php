<?php

namespace App\Http\Requests\asrama;

use Illuminate\Foundation\Http\FormRequest;

class RequestAsrama extends FormRequest
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
            "tipe_asrama_id" => "required",
            "a_nama_ruangan" => "required",
        ];
    }

    public function messages()
    {
        return [
            "tipe_asrama_id.required" => "Tipe Asrama mohon diisi !",
            "a_nama_ruangan.required" => "Nama Ruangan mohon diisi !",
        ];
    }
}
