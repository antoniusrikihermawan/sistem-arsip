<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Http\Requests\SuratMasukRequest;
use App\Services\SuratService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SuratMasukController extends Controller
{
    public function __construct(
        private readonly SuratService $suratService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $suratMasuk = SuratMasuk::with('user')
            ->search($request->query('search'))
            ->filterByDate($request->query('start_date'), $request->query('end_date'))
            ->latest('id_surat')
            ->paginate(10)
            ->withQueryString();

        return view('surat-masuk.index', compact('suratMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('surat-masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratMasukRequest $request): RedirectResponse
    {
        try {
            $this->suratService->store(
                SuratMasuk::class,
                $request->validated(),
                $request->file('file_surat')
            );

            return redirect()->route('surat-masuk.index')
                ->with('success', 'Data Surat Masuk berhasil ditambahkan.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $surat_masuk): View
    {
        $surat_masuk->load('user');

        return view('surat-masuk.show', compact('surat_masuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $surat_masuk): View
    {
        return view('surat-masuk.edit', compact('surat_masuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratMasukRequest $request, SuratMasuk $surat_masuk): RedirectResponse
    {
        try {
            $this->suratService->update(
                $surat_masuk,
                $request->validated(),
                $request->file('file_surat')
            );

            return redirect()->route('surat-masuk.index')
                ->with('success', 'Data Surat Masuk berhasil diupdate.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()
                ->with('error', 'Terjadi kesalahan saat mengupdate data. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $surat_masuk): RedirectResponse
    {
        try {
            $this->suratService->destroy($surat_masuk);

            return redirect()->route('surat-masuk.index')
                ->with('success', 'Data Surat Masuk berhasil dihapus.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
