<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'plate_number' => 'required|string|max:20|unique:vehicles',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required' => 'Pelanggan wajib dipilih',
            'plate_number.required' => 'Nomor plat wajib diisi',
            'plate_number.unique' => 'Nomor plat sudah terdaftar',
            'model.required' => 'Model kendaraan wajib diisi',
            'year.required' => 'Tahun produksi wajib diisi',
        ];
    }
}
