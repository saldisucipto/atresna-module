<?php
namespace App\Http\Classes;

class FilesHandling
{
    // upload function
    public function upload(Object $image, String $directory, String $image_name)
    {
        /**
         * Uploaded Files
         */
        $uploadedFiles = $image;
        // Path
        $folder_target = $directory . '/';
        // Nama Images Baru
        $image_name_finall = $image_name ."-". \time().".".$uploadedFiles->getClientOriginalExtension();
        // Move To Folder
        $image->move($folder_target, $image_name_finall);
        // Mengembalikan Nama Image Baru
        return $image_name_finall;
    }

    // update function
    public function update(String $old_images, String $path)
    {
        /**
         * Update Images Files
         */
        $image_path = public_path($path. '\\') . $old_images;
        if (file_exists($image_path)) {
            @unlink($image_path);
        }
    }
}
