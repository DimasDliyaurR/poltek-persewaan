<?php

namespace App\Http\Requests\user\changePassword;

use Illuminate\Foundation\Http\FormRequest;

class RequestChangePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $a = ['admin_dpupk', 'admin_keuangan', "admin_kendaraan", "admin_asrama", "admin_alat_barang", "admin_gedung_lap", "admin_layanan"];
        return auth()->user()->level == "admin" or in_array(auth()->user()->level, $a);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password_lama' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'password_lama.required' => 'Password baru mohon diisi !',

            'password.required' => 'Password mohon diisi !',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Password tidak cocok dengan password konfirmasi',
        ];
    }
}
