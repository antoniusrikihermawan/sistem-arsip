<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Helpers\BulanHelper;
use App\Http\Requests\LaporanFilterRequest;
use App\Services\LaporanService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

class LaporanController extends Controller
{
    public function __construct(
        private readonly LaporanService $laporanService
    ) {}

    /**
     * Tampilkan halaman laporan bulanan.
     */
    public function index(LaporanFilterRequest $request): View
    {
        $bulan = $request->bulan();
        $tahun = $request->tahun();

        $laporan = $this->laporanService->getMonthlyReport($bulan, $tahun);

        return view('laporan.index', compact('laporan', 'bulan', 'tahun'));
    }

    /**
     * Export laporan ke PDF.
     */
    public function exportPdf(LaporanFilterRequest $request): Response
    {
        $bulan    = $request->bulan();
        $tahun    = $request->tahun();
        $laporan  = $this->laporanService->getMonthlyReport($bulan, $tahun);

        $namaBulan = BulanHelper::namaBulan($bulan);
        $filename  = "laporan-surat-{$namaBulan}-{$tahun}.pdf";

        $pdf = Pdf::loadView('laporan.laporan-pdf', compact('laporan', 'bulan', 'tahun', 'namaBulan'))
            ->setPaper('a4', 'landscape');

        return $pdf->download($filename);
    }

    /**
     * Export laporan ke Excel.
     */
    public function exportExcel(LaporanFilterRequest $request): BinaryFileResponse
    {
        $bulan = $request->bulan();
        $tahun = $request->tahun();

        $namaBulan = BulanHelper::namaBulan($bulan);
        $filename  = "laporan-surat-{$namaBulan}-{$tahun}.xlsx";

        return Excel::download(new LaporanExport($bulan, $tahun), $filename);
    }
}
