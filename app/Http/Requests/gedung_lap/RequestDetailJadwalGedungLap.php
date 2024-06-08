<?php

namespace App\Http\Requests\gedung_lap;

use Illuminate\Foundation\Http\FormRequest;

class RequestDetailJadwalGedungLap extends FormRequest
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
            "jadwal_id" => "required",
        ];
    }

    public function messages()
    {
        return [
            "jadwal_id.required" => "Jadwal mohon diisi !",
        ];
    }
}
