<?php

namespace App\Exports;

use App\Models\SuratMasuk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SuratMasukExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    private int $rowNumber = 0;

    public function __construct(
        private readonly int $bulan,
        private readonly int $tahun
    ) {}

    public function collection(): Collection
    {
        return SuratMasuk::query()
            ->with('user')
            ->whereMonth('tanggal_surat', $this->bulan)
            ->whereYear('tanggal_surat', $this->tahun)
            ->latest('tanggal_surat')
            ->get();
    }

    /**
     * @param SuratMasuk $surat
     */
    public function map($surat): array
    {
        return [
            ++$this->rowNumber,
            $surat->nomer_surat,
            $surat->tanggal_surat->format('d-m-Y'),
            $surat->tanggal_terima->format('d-m-Y'),
            $surat->pengirim,
            $surat->perihal,
            $surat->ditujukan,
        ];
    }

    public function headings(): array
    {
        return ['No', 'Nomer Surat', 'Tanggal Surat', 'Tanggal Terima', 'Pengirim', 'Perihal', 'Ditujukan'];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType'   => Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFD9E1F2'],
                ],
            ],
        ];
    }

    public function title(): string
    {
        return 'Surat Masuk';
    }
}
