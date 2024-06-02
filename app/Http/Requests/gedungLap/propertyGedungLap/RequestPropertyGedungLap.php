<?php

namespace App\Http\Requests\gedungLap\propertyGedungLap;

use Illuminate\Foundation\Http\FormRequest;

class RequestPropertyGedungLap extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->level == 'admin_gedung_lap' || auth()->user()->level == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "pg_nama" => "required"
        ];
    }

    public function messages()
    {
        return [
            "pg_nama.required" => "Nama property mohon diisi !"
        ];
    }
}
