<?php

namespace App\Http\Requests\layanan\TimLayanan;

use Illuminate\Foundation\Http\FormRequest;

class RequestTimLayanan extends FormRequest
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
            "tl_nama" => "required",
        ];
    }

    public function messages()
    {
        return [
            "tl_nama.required" => "Nama Tim mohon diisi !",
        ];
    }
}
