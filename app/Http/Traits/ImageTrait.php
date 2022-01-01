<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    private function uploadImage($file, $path, $oldFile = null)
    {
        $path = $file->storePublicly($path, 's3');
        Storage::disk('s3')->url($path);
        $fileData = explode('/', $path);
        $fileName = end($fileData);


        if(!is_null($oldFile))
        {
            if(Storage::disk('s3')->exists($path . '/' . $oldFile))
            {
                Storage::disk('s3')->delete($path . '/' . $oldFile);
            }
        }
        return $fileName;
    }

    private function scanImage($file, $path, $oldFile = null)
    {
        Storage::disk('s3')->put($path, file_get_contents($file), 'public' );

        if(!is_null($oldFile))
        {
//            unlink($oldFile);
        }
    }
}
