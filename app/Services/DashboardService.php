<?php

namespace App\Services;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use Carbon\Carbon;

class DashboardService
{
    /**
     * Get all data needed for the dashboard view.
     *
     * @return array<string, mixed>
     */
    public function getDashboardData(): array
    {
        return [
            'totalSuratMasuk' => SuratMasuk::count(),
            'totalSuratKeluar' => SuratKeluar::count(),
            'totalUsers' => User::count(),
            'chartData' => $this->getChartData(),
            'events' => $this->getCalendarEvents(),
            'recentSuratMasuk' => SuratMasuk::latest('tanggal_surat')->take(5)->get(),
            'recentSuratKeluar' => SuratKeluar::latest('tanggal_surat')->take(5)->get(),
        ];
    }

    /**
     * Get monthly chart data for the current year (database-agnostic).
     *
     * @return array{masuk: int[], keluar: int[]}
     */
    private function getChartData(): array
    {
        $currentYear = Carbon::now()->year;

        $suratMasukPerBulan = SuratMasuk::whereYear('tanggal_surat', $currentYear)
            ->get()
            ->groupBy(fn ($item) => $item->tanggal_surat->month)
            ->map->count()
            ->toArray();

        $suratKeluarPerBulan = SuratKeluar::whereYear('tanggal_surat', $currentYear)
            ->get()
            ->groupBy(fn ($item) => $item->tanggal_surat->month)
            ->map->count()
            ->toArray();

        $chartData = ['masuk' => [], 'keluar' => []];

        for ($i = 1; $i <= 12; $i++) {
            $chartData['masuk'][] = $suratMasukPerBulan[$i] ?? 0;
            $chartData['keluar'][] = $suratKeluarPerBulan[$i] ?? 0;
        }

        return $chartData;
    }

    /**
     * Get calendar events grouped by date (database-agnostic).
     *
     * @return array<int, array<string, string>>
     */
    private function getCalendarEvents(): array
    {
        $events = [];

        $suratMasukByDate = SuratMasuk::all()
            ->groupBy(fn ($item) => $item->tanggal_surat->toDateString());

        foreach ($suratMasukByDate as $date => $items) {
            $events[] = [
                'title' => 'Surat Masuk : ' . $items->count(),
                'start' => $date,
                'backgroundColor' => '#28a745',
                'borderColor' => '#28a745',
            ];
        }

        $suratKeluarByDate = SuratKeluar::all()
            ->groupBy(fn ($item) => $item->tanggal_surat->toDateString());

        foreach ($suratKeluarByDate as $date => $items) {
            $events[] = [
                'title' => 'Surat Keluar : ' . $items->count(),
                'start' => $date,
                'backgroundColor' => '#ffc107',
                'borderColor' => '#ffc107',
                'textColor' => '#000',
            ];
        }

        return $events;
    }
}
