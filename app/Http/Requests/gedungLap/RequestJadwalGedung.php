<?php

namespace App\Http\Requests\gedungLap;

use Illuminate\Foundation\Http\FormRequest;

class RequestJadwalGedung extends FormRequest
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
            "jg_mulai" => "required|date_format:H:i",
            "jg_akhir" => "required|date_format:H:i|after:jg_mulai",
        ];
    }

    public function messages()
    {
        return [
            "jg_mulai.required" => "Jam Mulai mohon diisi !",
            "jg_mulai.date_format:H:i" => "Jam mohon diisi berupa waktu !",

            "jg_akhir.required" => "Jam Akhir mohon diisi !",
            "jg_akhir.date_format:H:i" => "Jam akhir mohon diisi berupa waktu !",
            "jg_akhir.after:jg_mulai" => "Jam akhir mohon setelah waktu mulai !",
        ];
    }
}
