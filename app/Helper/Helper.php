<?php

use Illuminate\Support\Facades\Storage;

function uploadImage($file,  $folder = "", $target = "s3"): string
{
    $root = config('app.name', 'Laravel');
    $folder = $root . '/' . $folder;
    try {
        if ($target === "s3") {
            return $file->store($folder, 's3');
        }
        if ($target === 'local') {
            return $file->store($folder, 'public');
        }
        return "";
    } catch (\Exception $e) {
        return "";
    }
}

// get image url
function getImage($path, $target = "s3"): string
{
    if ($target === "s3") {
        return Storage::disk('s3')->url($path);
    }
    if ($target === 'local') {
        return Storage::disk('public')->url($path);
    }
    return "";
}
