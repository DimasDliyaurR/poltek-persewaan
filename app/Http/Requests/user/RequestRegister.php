<?php

namespace App\Http\Requests\user;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use InvalidArgumentException;

class RequestRegister extends FormRequest
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
        if ($this->getMethod() == "PUT") {
            return [
                'level' => 'required',
            ];
        }
        return [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'foto_ktp' => 'required|image|max:5120',
            'no_telp' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'username mohon diisi !',
            'username.max' => 'username terlalu panjang !',

            'level.required' => 'Level mohon diisi !',

            'email.required' => 'Email mohon diisi !',
            'email.email' => 'Format email tidak sah !',
            'email.max' => 'Email terlalu panjang !',
            'email.unique' => 'Email sudah terdaftar',

            'password.required' => 'Password mohon diisi !',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Password tidak cocok dengan password konfirmasi',

            'nama_lengkap.required' => 'Nama lengkap mohon diisi',

            'alamat.required' => 'Alamat mohon diisi !',

            'foto_ktp.required' => 'Foto Ktp Mohon diisi !',
            'foto_ktp.image' => 'Foto KTP mohon diisi menggunakan gambar !',
            'foto_ktp.dimensions' => 'Foto KTP melebihi dimensi 1800px 1800px !',

            'no_telp.required' => 'No Telepon mohon diisi !',
        ];
    }
}
