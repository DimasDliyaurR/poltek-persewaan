<?php

namespace App\Http\Requests\alatBarang\satuanAlatBarang;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestSatuanAlatBarang extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->level == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $satuanAlatBarang = $this->route();

        return [
            "sab_nama" => [
                "required",
                "unique" => Rule::unique("satuan_alat_barangs", "sab_nama")->ignore($satuanAlatBarang->id),
            ],
        ];
    }

    public function messages()
    {
        return [
            "sab_nama.required" => "Nama mohon diisi !",
            "sab_nama.unique" => "Nama sudah ada !",
        ];
    }
}
