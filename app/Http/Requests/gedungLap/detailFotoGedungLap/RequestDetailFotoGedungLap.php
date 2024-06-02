<?php

namespace App\Http\Requests\gedungLap\detailFotoGedungLap;

use Illuminate\Foundation\Http\FormRequest;

class RequestDetailFotoGedungLap extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->level == 'admin_gedung_lap' || auth()->user()->level == "admin" && auth()->user()->level;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "dfgl_foto" => "required",
        ];
    }

    public function messages()
    {
        return [
            "dfgl_foto.required" => "Foto mohon diisi !"
        ];
    }
}
