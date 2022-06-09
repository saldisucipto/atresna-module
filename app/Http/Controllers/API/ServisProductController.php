<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servis;
use Str;
use App\Http\Classes\FilesHandling;

class ServisProductController extends Controller
{
    // public function
    public function index(Request $request)
    {
        $imagesFile = new FilesHandling();
        $dataPost = $request->all();
        $images = $request->file('images');
        if ($request->isMethod('GET')) {
            $data = Servis::get()->all();
            if (empty($data)) {
                $data = [];
            }
            return response()->json(['data' => $data, 'message' => 'Berhasil Mengmabil Data Dari Database'], 200);
        } else if ($request->isMethod('POST')) {
            $dbData = new Servis();
            $dbData->slugs = Str::slug($dataPost['title']);
            $dbData->title = $dataPost['title'];
            $dbData->description = $dataPost['description'];
            if($images){
               $dbData->images_utama = $imagesFile->upload($images, 'servis', 'servis');
            }
            $dbData->save();
            return response()->json([ 'data' => $dataPost,  'message' => 'Data Baru Berhasil Dibuat'], 201);
        }
    }

    // edit dan delete
    public function update(Request $request, $slugs = null){
        $dataUpdate = $request->all();
        $dbData = Servis::find($slugs);
        $images = $request->file('images');
        $imagesFileHanndling = new FilesHandling();
        if($request->isMethod('POST')){
            $dbData->slugs = Str::slug($dataUpdate['title']);
            $dbData->title = $dataUpdate['title'];
            $dbData->description = $dataUpdate['description'];
            if($images){
               $imagesFileHanndling->update($dbData->images_utama, 'servis');
               $dbData->images_utama = $imagesFileHanndling->upload($images, 'servis', 'servis');
            }
            $dbData->update();
            return response()->json([ 'data' => $dataUpdate,  'message' => 'Data Berhasil Diupdate'], 201);
        }else if($request->isMethod('DELETE')){
            $imagesFileHanndling->update($dbData->images_utama, 'servis');
            $dbData->delete();
            return response()->json([ 'data' => $dataUpdate,  'message' => 'Data Berhasil Dihapus'], 201);
        }
    }
}
