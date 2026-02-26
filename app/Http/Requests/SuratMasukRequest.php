<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratMasukRequest extends FormRequest
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
        $fileRule = $this->isMethod('POST') ? 'required' : 'nullable';

        return [
            'nomer_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'tanggal_terima' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'ditujukan' => 'required|string|max:255',
            'file_surat' => "$fileRule|file|mimes:pdf,jpg,jpeg,png|max:2048",
        ];
    }

    /**
     * Kustomisasi pesan error validasi ke dalam Bahasa Indonesia.
     */
    public function messages(): array
    {
        return [
            'nomer_surat.required' => 'Nomor surat wajib diisi.',
            'nomer_surat.max' => 'Nomor surat tidak boleh lebih dari 255 karakter.',

            'tanggal_surat.required' => 'Tanggal surat wajib diisi.',
            'tanggal_surat.date' => 'Format tanggal surat tidak valid.',

            'tanggal_terima.required' => 'Tanggal terima wajib diisi.',
            'tanggal_terima.date' => 'Format tanggal terima tidak valid.',

            'pengirim.required' => 'Nama pengirim wajib diisi.',
            'pengirim.max' => 'Nama pengirim tidak boleh lebih dari 255 karakter.',

            'perihal.required' => 'Perihal surat wajib diisi.',
            'perihal.max' => 'Perihal tidak boleh lebih dari 255 karakter.',

            'ditujukan.required' => 'Ditujukan kepada wajib diisi.',
            'ditujukan.max' => 'Ditujukan kepada tidak boleh lebih dari 255 karakter.',

            'file_surat.required' => 'File surat wajib diunggah.',
            'file_surat.file' => 'File surat harus berupa file yang valid.',
            'file_surat.mimes' => 'File surat harus berformat PDF, JPG, JPEG, atau PNG.',
            'file_surat.max' => 'Ukuran file surat tidak boleh lebih dari 2MB.',
        ];
    }
}
