<?php

namespace App\Services;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Support\Collection;

class LaporanService
{
    /**
     * Ambil data laporan bulanan surat masuk & keluar.
     *
     * @return array{surat_masuk: Collection, surat_keluar: Collection, total_masuk: int, total_keluar: int}
     */
    public function getMonthlyReport(int $bulan, int $tahun): array
    {
        return [
            'surat_masuk'  => $this->getSuratMasuk($bulan, $tahun),
            'surat_keluar' => $this->getSuratKeluar($bulan, $tahun),
            'total_masuk'  => $this->countSuratMasuk($bulan, $tahun),
            'total_keluar' => $this->countSuratKeluar($bulan, $tahun),
        ];
    }

    private function getSuratMasuk(int $bulan, int $tahun): Collection
    {
        return SuratMasuk::query()
            ->with('user')
            ->whereMonth('tanggal_surat', $bulan)
            ->whereYear('tanggal_surat', $tahun)
            ->latest('tanggal_surat')
            ->get();
    }

    private function getSuratKeluar(int $bulan, int $tahun): Collection
    {
        return SuratKeluar::query()
            ->with('user')
            ->whereMonth('tanggal_surat', $bulan)
            ->whereYear('tanggal_surat', $tahun)
            ->latest('tanggal_surat')
            ->get();
    }

    private function countSuratMasuk(int $bulan, int $tahun): int
    {
        return SuratMasuk::query()
            ->whereMonth('tanggal_surat', $bulan)
            ->whereYear('tanggal_surat', $tahun)
            ->count();
    }

    private function countSuratKeluar(int $bulan, int $tahun): int
    {
        return SuratKeluar::query()
            ->whereMonth('tanggal_surat', $bulan)
            ->whereYear('tanggal_surat', $tahun)
            ->count();
    }
}