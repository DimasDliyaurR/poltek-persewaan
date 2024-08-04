<?php

namespace App\Http\Requests\layanan\DetailFotoLayanan;

use Illuminate\Foundation\Http\FormRequest;

class RequestDetailFotoLayanan extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->level == 'admin_layanan' || auth()->user()->level == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "dfl_foto" => "required|image|dimensions:max_width=1800,max_height=1800",
        ];
    }

    public function messages()
    {
        return [
            "dfl_foto.required" => "Foto mohon diisi !",
        ];
    }
}
