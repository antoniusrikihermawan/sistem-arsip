<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratKeluarRequest extends FormRequest
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
            'nomer_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'tanggal_kirim' => 'required|date',
            'perihal' => 'required|string|max:255',
            'ditujukan' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ];
    }
}
