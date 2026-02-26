<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    /**
     * Upload a file and return its storage path.
     */
    public function handleUpload(UploadedFile $file, string $path = 'surat', string $disk = 'public'): ?string
    {
        return $file->store($path, $disk);
    }

    /**
     * Delete a file from storage.
     */
    public function deleteFile(?string $filePath, string $disk = 'public'): void
    {
        if (! $filePath) {
            return;
        }

        if (Storage::disk($disk)->exists($filePath)) {
            Storage::disk($disk)->delete($filePath);
        }
    }
}
