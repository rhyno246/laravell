<?php
namespace App\Traits;
use Storage;

/**
 * 
 */
trait StorageImageTrait
{
    //upload file name feature image ,  storeAs -> get exact name image
    public function storageTraitUpload ($request , $feildName , $folderName) {
        if($request->hasFile($feildName)){
            $file = $request->$feildName;
            $fileNameOrigin = $file->getClientOriginalName(); //get name file
            $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension(); // get path name file
            $path = $request->file($feildName)->storeAs('public/' . $folderName . '/' . auth()->id() , $fileNameHash);
            $dataUploadTrait = [
                "file_name" => $fileNameOrigin,
                "file_path" => Storage::url($path),
            ];
            return $dataUploadTrait;
        }
        return null;
    }

    // update mutiple image
    public function storageTraitUploadMutiple ($file , $folderName) {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/' . $folderName . '/' . auth()->id() , $fileNameHash);
        $dataUploadTrait = [
            "file_name" => $fileNameOrigin,
            "file_path" => Storage::url($path),
        ];
        return $dataUploadTrait;
    }
}
