<?php

namespace App\Http\Requests\layanan\DetailVideoLayanan;

use Illuminate\Foundation\Http\FormRequest;

class RequestVideoLayanan extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->level == 'admin_layanan' || auth()->user()->level == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "vl_link" => "required|video",
        ];
    }

    public function messages()
    {
        return [
            "vl_link.required" => "Link mohon diisi !",
        ];
    }
}
