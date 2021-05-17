<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Storage;

trait StorageImageTrait
{

    public function storageTraitUpload($request, $fieldName, $foderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $filenameOrigin = $file->getClientOriginalName();
            $random = Str::random(20);
            $fileNameHash = $random . '.' . $file->getClientOriginalName();
            $filePath = $request->file($fieldName)
                ->storeAs('public/' . $foderName . '/' . auth()->id(), $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $filenameOrigin,
                'file_path' => Storage::url($filePath),
            ];
            return $dataUploadTrait;
        }
        return null;

    }

    public function storageTraitUploadMultiple($file, $foderName)
    {
        $filenameOrigin = $file->getClientOriginalName();
        $random = Str::random(20);
        $fileNameHash = $random . '.' . $file->getClientOriginalName();
        $filePath = $file->storeAs('public/' . $foderName . '/' . auth()->id(), $fileNameHash);
        $dataUploadTrait = [
            'file_name' => $filenameOrigin,
            'file_path' => Storage::url($filePath),
        ];
        return $dataUploadTrait;

    }
}
