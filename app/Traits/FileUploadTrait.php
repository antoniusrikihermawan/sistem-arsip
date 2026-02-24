<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    /**
     * Upload a file and return its path.
     *
     * @param \Illuminate\Http\UploadedFile 
     * @param string 
     * @param string 
     * @return string
     */
    public function handleUpload($file, $path = 'surat', $disk = 'public')
    {
        if ($file) {
            return $file->store($path, $disk);
        }
        return null;
    }

    /**
     * Delete a file from storage.
     *
     * @param string 
     * @param string 
     * @return void
     */
    public function deleteFile($filePath, $disk = 'public')
    {
        if ($filePath && Storage::disk($disk)->exists($filePath)) {
            Storage::disk($disk)->delete($filePath);
        }
    }
}
