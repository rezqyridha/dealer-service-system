<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'vehicle_id' => 'required|exists:vehicles,id',
            'technician_id' => 'required|exists:technicians,id',
            'service_date' => 'required|date',
            'service_type' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'vehicle_id.required' => 'Kendaraan wajib dipilih',
            'technician_id.required' => 'Teknisi wajib dipilih',
            'service_date.required' => 'Tanggal servis wajib diisi',
            'service_type.required' => 'Jenis servis wajib diisi',
        ];
    }
}
