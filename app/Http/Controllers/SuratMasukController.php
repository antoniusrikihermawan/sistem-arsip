<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Http\Requests\SuratMasukRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');

        $suratMasuk = SuratMasuk::with('user')
            ->when($search, function ($query, $search) {
                return $query->where('nomer_surat', 'like', "%{$search}%")
                             ->orWhere('perihal', 'like', "%{$search}%");
            })
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                return $query->whereBetween('tanggal_surat', [$start_date, $end_date]);
            })
            ->latest('id_surat')
            ->paginate(10)
            ->withQueryString(); // Keep search query in pagination links

        return view('surat-masuk.index', compact('suratMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat-masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratMasukRequest $request)
    {
        $data = $request->validated();
        $data['id_user'] = auth()->id();

        if ($request->hasFile('file_surat')) {
            $data['file_surat'] = $request->file('file_surat')->store('surat', 'public');
        }

        SuratMasuk::create($data);

        return redirect()->route('surat-masuk.index')->with('success', 'Data Surat Masuk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $surat_masuk = SuratMasuk::findOrFail($id);
        return view('surat-masuk.show', compact('surat_masuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $surat_masuk = SuratMasuk::findOrFail($id);
        return view('surat-masuk.edit', compact('surat_masuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratMasukRequest $request, string $id)
    {
        $surat_masuk = SuratMasuk::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('file_surat')) {
            if ($surat_masuk->file_surat) {
                Storage::disk('public')->delete($surat_masuk->file_surat);
            }
            $data['file_surat'] = $request->file('file_surat')->store('surat', 'public');
        }

        $surat_masuk->update($data);

        return redirect()->route('surat-masuk.index')->with('success', 'Data Surat Masuk berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat_masuk = SuratMasuk::findOrFail($id);
        
        if ($surat_masuk->file_surat) {
            Storage::disk('public')->delete($surat_masuk->file_surat);
        }
        
        $surat_masuk->delete();

        return redirect()->route('surat-masuk.index')->with('success', 'Data Surat Masuk berhasil dihapus.');
    }
}
