<?php

namespace App\Http\Requests\asrama\detailFasilitasAsrama;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestDetailFasilitasAsrama extends FormRequest
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
        $detailFasilitasAsrama = $this->route();
        return [
            "fasilitas_asrama_id" => [
                "required",
            ],
        ];
    }

    public  function messages()
    {
        return [
            "fasilitas_asrama_id.required" => "Fasilitas Asrama belum diisi",
            "fasilitas_asrama_id.unique" => "Fasilitas sudah digunakan",
        ];
    }
}
