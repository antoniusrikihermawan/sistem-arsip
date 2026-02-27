<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaporanExport implements WithMultipleSheets
{
    public function __construct(
        private readonly int $bulan,
        private readonly int $tahun
    ) {}

    public function sheets(): array
    {
        return [
            new SuratMasukExport($this->bulan, $this->tahun),
            new SuratKeluarExport($this->bulan, $this->tahun),
        ];
    }
}
