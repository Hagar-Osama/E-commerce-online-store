<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait ImagesTrait
{
    private function uploadImage($file, $fileName, $path, $oldFile = null)
    {
        $file->move(public_path('images/'.$path), $fileName);

        if(!is_null($oldFile))
        {
            unlink(public_path($oldFile));
        }
    }

    private function scanImage($file, $path, $oldFile = null)
    {
        Storage::disk('local')->put($path, file_get_contents($file) );

        if(!is_null($oldFile))
        {
            unlink($oldFile);
        }
    }
}
