<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Str;
use App\Http\Classes\FilesHandling;

class StaticContact extends Controller
{
    // index function
    public function index(Request $request){
        $imagesFile = new FilesHandling();
        $dataPost = $request->all();
        $images = $request->file('images');
        if ($request->isMethod('GET')) {
            $data = Contact::get()->all();
            if (empty($data)) {
                $data = "Data Masih Kosong";
            }
            return response()->json(['data' => $data, 'message' => 'Berhasil Mengmabil Data Dari Database'], 200);
        } else if ($request->isMethod('POST')) {
            $dbData = new Contact();
            $dbData->slugs = Str::slug($dataPost['title']);
            $dbData->title = $dataPost['title'];
            $dbData->description = $dataPost['description'];
            if($images){
               $dbData->images = $imagesFile->upload($images, 'contact', 'contact');
            }
            $dbData->save();
            return response()->json([ 'data' => $dataPost,  'message' => 'Data Baru Berhasil Dibuat'], 201);
        }
    }

     // edit dan delete
     public function update(Request $request, $slugs = null){
        $dataUpdate = $request->all();
        $dbData = Contact::find($slugs);
        $images = $request->file('images');
        $imagesFileHanndling = new FilesHandling();
        if($request->isMethod('POST')){
            $dbData->slugs = Str::slug($dataUpdate['title']);
            $dbData->title = $dataUpdate['title'];
            $dbData->description = $dataUpdate['description'];
            if($images){
               $imagesFileHanndling->update($dbData->images, 'servis');
               $dbData->images = $imagesFileHanndling->upload($images, 'contact', 'contact');
            }
            $dbData->update();
            return response()->json([ 'data' => $dataUpdate,  'message' => 'Data Berhasil Diupdate'], 201);
        }else if($request->isMethod('DELETE')){
            $imagesFileHanndling->update($dbData->images, 'contact');
            $dbData->delete();
            return response()->json([ 'data' => $dataUpdate,  'message' => 'Data Berhasil Dihapus'], 201);
        }
    }
}
