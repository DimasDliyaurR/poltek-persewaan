<?php

namespace App\Http\Requests\kendaraan;

use Illuminate\Foundation\Http\FormRequest;

class RequestTransaksiKendaraan extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !auth()->user()->level == 'customer';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "tk_tanggal_sewa" => "required",
            "tk_tanggal_kembali" => "required",
        ];
    }
}
