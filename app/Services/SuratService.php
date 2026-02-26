<?php

namespace App\Services;

use App\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SuratService
{
    use FileUploadTrait;

    /**
     * Store a new surat record with optional file upload.
     *
     * @param  class-string<Model>  $modelClass
     */
    public function store(string $modelClass, array $data, ?UploadedFile $file = null): Model
    {
        $data['id_user'] = auth()->id();

        DB::beginTransaction();
        $uploadedFile = null;

        try {
            if ($file) {
                $uploadedFile = $this->handleUpload($file);
                $data['file_surat'] = $uploadedFile;
            }

            $record = $modelClass::create($data);

            DB::commit();
            return $record;

        } catch (\Exception $e) {
            DB::rollBack();

            if ($uploadedFile) {
                $this->deleteFile($uploadedFile);
            }

            Log::error("Gagal menambahkan {$modelClass}: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Update an existing surat record with optional file replacement.
     */
    public function update(Model $record, array $data, ?UploadedFile $file = null): Model
    {
        DB::beginTransaction();
        $newUploadedFile = null;
        $oldFile = $record->file_surat;

        try {
            if ($file) {
                $newUploadedFile = $this->handleUpload($file);
                $data['file_surat'] = $newUploadedFile;
            }

            $record->update($data);
            DB::commit();

            // Delete old file only after successful commit
            if ($newUploadedFile && $oldFile) {
                $this->deleteFile($oldFile);
            }

            return $record;

        } catch (\Exception $e) {
            DB::rollBack();

            if ($newUploadedFile) {
                $this->deleteFile($newUploadedFile);
            }

            Log::error("Gagal mengupdate record: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Delete a surat record and its associated file.
     */
    public function destroy(Model $record): void
    {
        $fileToDelete = $record->file_surat;

        DB::beginTransaction();

        try {
            $record->delete();
            DB::commit();

            if ($fileToDelete) {
                $this->deleteFile($fileToDelete);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Gagal menghapus record: " . $e->getMessage());
            throw $e;
        }
    }
}
