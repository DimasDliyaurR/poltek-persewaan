<?php

namespace App\Http\Requests\asrama;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestAsrama extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->level == 'admin_asrama' || auth()->user()->level == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $asrama = $this->route();

        return [
            "tipe_asrama_id" => "required",
            "a_nama_ruangan" => [
                "required", "unique" =>
                Rule::unique("asramas", "a_nama_ruangan")->ignore($asrama->id)
            ],
        ];
    }

    public function messages()
    {
        return [
            "tipe_asrama_id.required" => "Tipe Asrama mohon diisi !",
            "a_nama_ruangan.required" => "Nama Ruangan mohon diisi !",
            "a_nama_ruangan.unique" => "Nama Ruangan sudah ada !",
        ];
    }
}
