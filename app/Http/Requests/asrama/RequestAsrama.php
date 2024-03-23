<?php

namespace App\Http\Requests\asrama;

use Illuminate\Foundation\Http\FormRequest;

class RequestAsrama extends FormRequest
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
        $asrama = $this->route();

        if ($this->getMethod() == "PUT") {
            $rules = [
                "a_nama_ruangan" => "required",
                "a_tarif" => "required|numeric",
            ];

            if ($this->input("a_foto") !== null) {
                $rules += [
                    "a_foto" => "required|image|extensions:jpg,png"
                ];
            }

            return $rules;
        } else {
            return [
                "a_foto" => "required|image|extensions:jpg,png",
                "a_nama_ruangan" => "required",
                "a_tarif" => "required|numeric",
            ];
        }
    }

    public function messages()
    {
        return [
            "a_foto.required" => "Foto Asrama belum diisi",
            "a_foto.image" => "Foto Asrama mohon diisi menggunakan gambar",
            "a_nama_ruangan.required" => "Nama Ruangan belum diisi",
            "a_tarif.required" => "Tarif Harga belum diisi",
            "a_tarif.numeric" => "Tarif Harga mohon diisi dengan angka",
        ];
    }
}
