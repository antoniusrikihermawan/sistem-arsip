<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Http\Requests\SuratMasukRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SuratMasukController extends Controller
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

        $suratMasuk = SuratMasuk::with('user')
            ->search($search)
            ->filterByDate($start_date, $end_date)
            ->latest('id_surat')
            ->paginate(10)
            ->withQueryString();

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
        
        DB::beginTransaction();
        $uploadedFile = null;

        try {
            if ($request->hasFile('file_surat')) {
                $uploadedFile = $this->handleUpload($request->file('file_surat'));
                $data['file_surat'] = $uploadedFile;
            }

            SuratMasuk::create($data);
            
            DB::commit();
            return redirect()->route('surat-masuk.index')->with('success', 'Data Surat Masuk berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            // Delete the file if database insertion failed
            if ($uploadedFile) {
                $this->deleteFile($uploadedFile);
            }
            
            Log::error('Gagal menambahkan Surat Masuk: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
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

        DB::beginTransaction();
        $newUploadedFile = null;
        $oldFile = $surat_masuk->file_surat;

        try {
            if ($request->hasFile('file_surat')) {
                $newUploadedFile = $this->handleUpload($request->file('file_surat'));
                $data['file_surat'] = $newUploadedFile;
            }

            $surat_masuk->update($data);
            DB::commit();

            // If transaction succeeds and there is a new file, delete the old one
            if ($newUploadedFile && $oldFile) {
                $this->deleteFile($oldFile);
            }

            return redirect()->route('surat-masuk.index')->with('success', 'Data Surat Masuk berhasil diupdate.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            // Clean up the new file if transaction fails
            if ($newUploadedFile) {
                $this->deleteFile($newUploadedFile);
            }
            
            Log::error('Gagal mengupdate Surat Masuk: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengupdate data. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat_masuk = SuratMasuk::findOrFail($id);
        $fileToDelete = $surat_masuk->file_surat;
        
        DB::beginTransaction();
        
        try {
            $surat_masuk->delete();
            DB::commit();
            
            // Only delete the file physically after successful database deletion
            if ($fileToDelete) {
                $this->deleteFile($fileToDelete);
            }

            return redirect()->route('surat-masuk.index')->with('success', 'Data Surat Masuk berhasil dihapus.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal menghapus Surat Masuk: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
