<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTechnicianRequest extends FormRequest
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
        return [
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'specialization' => 'sometimes|required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama teknisi wajib diisi',
            'phone.required' => 'Nomor telepon wajib diisi',
            'specialization.required' => 'Keahlian/Spesialisasi wajib diisi',
        ];
    }
}
