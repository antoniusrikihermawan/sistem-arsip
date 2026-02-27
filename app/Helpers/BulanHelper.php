<?php

namespace App\Helpers;

final class BulanHelper
{
    /**
     * Daftar nama bulan dalam Bahasa Indonesia.
     */
    private const NAMA_BULAN = [
        1  => 'Januari',
        2  => 'Februari',
        3  => 'Maret',
        4  => 'April',
        5  => 'Mei',
        6  => 'Juni',
        7  => 'Juli',
        8  => 'Agustus',
        9  => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    /**
     * Konversi angka bulan (1-12) ke nama bulan Indonesia.
     */
    public static function namaBulan(int $bulan): string
    {
        return self::NAMA_BULAN[$bulan] ?? 'Unknown';
    }
}
