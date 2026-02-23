<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Http\Requests\SuratKeluarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');

        $suratKeluar = SuratKeluar::with('user')
            ->when($search, function ($query, $search) {
                return $query->where('nomer_surat', 'like', "%{$search}%")
                             ->orWhere('perihal', 'like', "%{$search}%");
            })
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                return $query->whereBetween('tanggal_surat', [$start_date, $end_date]);
            })
            ->latest('id_surat_keluar')
            ->paginate(10)
            ->withQueryString(); // Keep search query in pagination links

        return view('surat-keluar.index', compact('suratKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat-keluar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratKeluarRequest $request)
    {
        $data = $request->validated();
        $data['id_user'] = auth()->id();

        if ($request->hasFile('file_surat')) {
            $data['file_surat'] = $request->file('file_surat')->store('surat', 'public');
        }

        SuratKeluar::create($data);

        return redirect()->route('surat-keluar.index')->with('success', 'Data Surat Keluar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $surat_keluar = SuratKeluar::findOrFail($id);
        return view('surat-keluar.show', compact('surat_keluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $surat_keluar = SuratKeluar::findOrFail($id);
        return view('surat-keluar.edit', compact('surat_keluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratKeluarRequest $request, string $id)
    {
        $surat_keluar = SuratKeluar::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('file_surat')) {
            if ($surat_keluar->file_surat) {
                Storage::disk('public')->delete($surat_keluar->file_surat);
            }
            $data['file_surat'] = $request->file('file_surat')->store('surat', 'public');
        }

        $surat_keluar->update($data);

        return redirect()->route('surat-keluar.index')->with('success', 'Data Surat Keluar berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat_keluar = SuratKeluar::findOrFail($id);
        
        if ($surat_keluar->file_surat) {
            Storage::disk('public')->delete($surat_keluar->file_surat);
        }
        
        $surat_keluar->delete();

        return redirect()->route('surat-keluar.index')->with('success', 'Data Surat Keluar berhasil dihapus.');
    }
}
