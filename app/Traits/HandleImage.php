<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HandleImage
{
    public function imageUploading(UploadedFile $file, string $path): string
    {
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($path, $file, $imageName);
        return $imageName;
    }

    public function imageUpdate(UploadedFile $file, string $oldImage, string $path): string
    {

        if ($oldImage && Storage::disk('public')->exists($path . '/' . $oldImage)) {
            Storage::disk('public')->delete($path . '/' . $oldImage);
        }
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($path, $file, $imageName);
        return $imageName;
    }


    public function deleteImage($imageName, $path)
    {
        return Storage::disk('public')->delete($path . '/' . $imageName);
    }
}
