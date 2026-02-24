<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Http\Requests\SuratKeluarRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SuratKeluarController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');

        $suratKeluar = SuratKeluar::with('user')
            ->search($search)
            ->filterByDate($start_date, $end_date)
            ->latest('id_surat_keluar')
            ->paginate(10)
            ->withQueryString();

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

        DB::beginTransaction();
        $uploadedFile = null;

        try {
            if ($request->hasFile('file_surat')) {
                $uploadedFile = $this->handleUpload($request->file('file_surat'));
                $data['file_surat'] = $uploadedFile;
            }

            SuratKeluar::create($data);
            
            DB::commit();
            return redirect()->route('surat-keluar.index')->with('success', 'Data Surat Keluar berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            // Delete the file if database insertion failed
            if ($uploadedFile) {
                $this->deleteFile($uploadedFile);
            }
            
            Log::error('Gagal menambahkan Surat Keluar: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
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

        DB::beginTransaction();
        $newUploadedFile = null;
        $oldFile = $surat_keluar->file_surat;

        try {
            if ($request->hasFile('file_surat')) {
                $newUploadedFile = $this->handleUpload($request->file('file_surat'));
                $data['file_surat'] = $newUploadedFile;
            }

            $surat_keluar->update($data);
            DB::commit();

            // If transaction succeeds and there is a new file, delete the old one
            if ($newUploadedFile && $oldFile) {
                $this->deleteFile($oldFile);
            }

            return redirect()->route('surat-keluar.index')->with('success', 'Data Surat Keluar berhasil diupdate.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            // Clean up the new file if transaction fails
            if ($newUploadedFile) {
                $this->deleteFile($newUploadedFile);
            }
            
            Log::error('Gagal mengupdate Surat Keluar: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengupdate data. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat_keluar = SuratKeluar::findOrFail($id);
        $fileToDelete = $surat_keluar->file_surat;
        
        DB::beginTransaction();
        
        try {
            $surat_keluar->delete();
            DB::commit();
            
            // Only delete the file physically after successful database deletion
            if ($fileToDelete) {
                $this->deleteFile($fileToDelete);
            }

            return redirect()->route('surat-keluar.index')->with('success', 'Data Surat Keluar berhasil dihapus.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal menghapus Surat Keluar: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
