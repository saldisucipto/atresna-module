<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsArtikel;
use App\Http\Classes\FilesHandling;
use Str;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    // index method
    public function index()
    {
        $data = NewsArtikel::get()->all();
        if (empty($data)) {
            $data = "Tidak Ada Data Pada Server";
        }
        return response()->json(['data' => $data, 'message' => 'Berhasil MengambbiL data dari database'], 200);
    }
    // create controller
    public function create(Request $create)
    {
        // catch all HTTP request Inpute
        $data = $create->all();
        $images = $create->file('images');
        // validasi inputan
        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $dbData = new NewsArtikel;
        $dbData->slugs = Str::slug($data['title']);
        $dbData->title = $data['title'];
        $dbData->description = $data['description'];
        if ($images) {
            $fileHandling = new FilesHandling();
            $dbData->images_utama = $fileHandling->upload($images, 'news-artikel', 'news-and-artikel');
        }
        $dbData->save();
        return response()->json(['data' => $data, 'message' => 'Berhasil Membuat Postingan Baru'], 201);
    }

    // uodatte functionn
    public function update(Request $update, $slugs = null)
    {
        $data = $update->all();
        $images = $update->file('images');
        $dbData = NewsArtikel::find($slugs);
        $fileHandling = new FilesHandling();
        if ($update->isMethod('post')) {
            $dbData->slugs = Str::slug($data['title']);
            $dbData->title = $data['title'];
            $dbData->description = $data['description'];
            if ($images) {
                $fileHandling->update($dbData->images_utama, 'news-artikel');
                $dbData->images_utama = $fileHandling->upload($images, 'news-artikel', 'news-and-artikel');
            }
            $dbData->update();
            return response()->json(['data' => $data, 'message' => 'Berhasil Di Update'], 201);
        }else if($update->isMethod('DELETE')){
            $fileHandling->update($dbData->images_utama, 'news-artikel');
            $dbData->delete();
            return response()->json(['data' => $data, 'message' => 'Berhasil Di Hapus'], 201);
        }
    }
    // detaails
    public function details($slugs = null){
        $dbData = NewsArtikel::find($slugs);
        return response()->json(['data' => $dbData, 'message' => 'Berhasil Mengambil Data Dari Database'], 201);
    }
}
