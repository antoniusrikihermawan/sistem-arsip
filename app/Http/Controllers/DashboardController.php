<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSuratMasuk = SuratMasuk::count();
        $totalSuratKeluar = SuratKeluar::count();
        $totalUsers = User::count();

        // Chart Data: Jumlah surat per bulan tahun ini
        $currentYear = date('Y');
        
        $suratMasukPerBulan = SuratMasuk::selectRaw('MONTH(tanggal_surat) as bulan, COUNT(*) as total')
            ->whereYear('tanggal_surat', $currentYear)
            ->groupBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();
            
        $suratKeluarPerBulan = SuratKeluar::selectRaw('MONTH(tanggal_surat) as bulan, COUNT(*) as total')
            ->whereYear('tanggal_surat', $currentYear)
            ->groupBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();
            
        $chartData = [
            'masuk' => [],
            'keluar' => [],
        ];
        
        for ($i = 1; $i <= 12; $i++) {
            $chartData['masuk'][] = $suratMasukPerBulan[$i] ?? 0;
            $chartData['keluar'][] = $suratKeluarPerBulan[$i] ?? 0;
        }

        $events = [];
        
        // Group Surat Masuk by Date
        $suratMasukByDate = SuratMasuk::selectRaw('DATE(tanggal_surat) as date, COUNT(*) as total')
            ->groupBy('date')
            ->get();
            
        foreach ($suratMasukByDate as $sm) {
            $events[] = [
                'title' => 'Surat Masuk : ' . $sm->total,
                'start' => $sm->date,
                'backgroundColor' => '#28a745',
                'borderColor' => '#28a745',
            ];
        }

        // Group Surat Keluar by Date
        $suratKeluarByDate = SuratKeluar::selectRaw('DATE(tanggal_surat) as date, COUNT(*) as total')
            ->groupBy('date')
            ->get();
            
        foreach ($suratKeluarByDate as $sk) {
            $events[] = [
                'title' => 'Surat Keluar : ' . $sk->total,
                'start' => $sk->date,
                'backgroundColor' => '#ffc107', 
                'borderColor' => '#ffc107',
                'textColor' => '#000', 
            ];
        }

        // Recent Surat tables (last 5)
        $recentSuratMasuk = SuratMasuk::orderBy('tanggal_surat', 'desc')->take(5)->get();
        $recentSuratKeluar = SuratKeluar::orderBy('tanggal_surat', 'desc')->take(5)->get();

        return view('dashboard.index', compact(
            'totalSuratMasuk', 
            'totalSuratKeluar', 
            'totalUsers',
            'chartData',
            'events',
            'recentSuratMasuk',
            'recentSuratKeluar'
        ));
    }
}
