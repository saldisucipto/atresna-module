<?php
namespace App\Classes;

class Files
{
    public function uploadImage(Object $image, String $directory_tujuan, String $image_name)
    {
        // catching upload files
        $uploadedFiles = $image;
        // rename uploaded images
        $renameImages = preg_replace('/\s+/', '', $uploadedFiles->getClientOriginalName());
        // target directory
        $folderDirectory = 'storage/'. $directory_tujuan . '/';
        // image name baru
        $nama_image = $image_name."-".time()."-".$renameImages;
        // move to folder
        $image->move($folderDirectory, $nama_image);
        return $nama_image;
    }
}
