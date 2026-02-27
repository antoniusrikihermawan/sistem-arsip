<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaporanFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Siapkan data sebelum validasi.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'bulan' => $this->input('bulan', now()->month),
            'tahun' => $this->input('tahun', now()->year),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer|min:2020|max:' . (now()->year + 1),
        ];
    }

    /**
     * Kustomisasi pesan error validasi ke dalam Bahasa Indonesia.
     */
    public function messages(): array
    {
        return [
            'bulan.required' => 'Bulan wajib diisi.',
            'bulan.integer'  => 'Bulan harus berupa angka.',
            'bulan.between'  => 'Bulan harus antara 1 sampai 12.',

            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.integer'  => 'Tahun harus berupa angka.',
            'tahun.min'      => 'Tahun minimal 2020.',
            'tahun.max'      => 'Tahun maksimal ' . (now()->year + 1) . '.',
        ];
    }

    /**
     * Ambil nilai bulan yang sudah tervalidasi.
     */
    public function bulan(): int
    {
        return (int) $this->validated('bulan');
    }

    /**
     * Ambil nilai tahun yang sudah tervalidasi.
     */
    public function tahun(): int
    {
        return (int) $this->validated('tahun');
    }
}
