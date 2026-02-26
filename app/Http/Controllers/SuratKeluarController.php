<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Http\Requests\SuratKeluarRequest;
use App\Services\SuratService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SuratKeluarController extends Controller
{
    public function __construct(
        private readonly SuratService $suratService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $suratKeluar = SuratKeluar::with('user')
            ->search($request->query('search'))
            ->filterByDate($request->query('start_date'), $request->query('end_date'))
            ->latest('id_surat_keluar')
            ->paginate(10)
            ->withQueryString();

        return view('surat-keluar.index', compact('suratKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('surat-keluar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratKeluarRequest $request): RedirectResponse
    {
        try {
            $this->suratService->store(
                SuratKeluar::class,
                $request->validated(),
                $request->file('file_surat')
            );

            return redirect()->route('surat-keluar.index')
                ->with('success', 'Data Surat Keluar berhasil ditambahkan.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $surat_keluar): View
    {
        $surat_keluar->load('user');

        return view('surat-keluar.show', compact('surat_keluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeluar $surat_keluar): View
    {
        return view('surat-keluar.edit', compact('surat_keluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratKeluarRequest $request, SuratKeluar $surat_keluar): RedirectResponse
    {
        try {
            $this->suratService->update(
                $surat_keluar,
                $request->validated(),
                $request->file('file_surat')
            );

            return redirect()->route('surat-keluar.index')
                ->with('success', 'Data Surat Keluar berhasil diupdate.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()
                ->with('error', 'Terjadi kesalahan saat mengupdate data. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $surat_keluar): RedirectResponse
    {
        try {
            $this->suratService->destroy($surat_keluar);

            return redirect()->route('surat-keluar.index')
                ->with('success', 'Data Surat Keluar berhasil dihapus.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
