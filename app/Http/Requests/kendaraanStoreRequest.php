<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kendaraanStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'Merk_kendaraan_id' => ['required', 'integer', 'exists:Merk_kendaraans,id'],
            'k_plat' => ['required', 'string'],
            'k_status' => ['required', 'in:tersedia,tidak'],
            'merk_kendaraan_id' => ['required', 'integer', 'exists:merk_kendaraans,id'],
            'Merk_kendaraan_id' => ['required', 'integer', 'exists:Merk_kendaraans,id'],
            'k_plat' => ['required', 'string'],
            'k_status' => ['required', 'in:tersedia,tidak'],
            'merk_kendaraan_id' => ['required', 'integer', 'exists:merk_kendaraans,id'],
        ];
    }
}
