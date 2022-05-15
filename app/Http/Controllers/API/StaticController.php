<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\StaticKonten;
use Str;
use App\Http\Classes\FilesHandling;

class StaticController extends Controller
{

    // index function
    public function index()
    {
        $data = StaticKonten::get()->all();
        return response()->json($data, 200);
    }


    //craete function
    public function create(Request $request)
    {
        $data = $request->all();
        $images_file = $request->file('imagesFile');
        $image = new FilesHandling();

        $static_konten = new StaticKonten();
        $static_konten->title = $data['title'];
        $static_konten->desc = $data['desc'];
        $static_konten->imagesFile = $image->upload($images_file, 'static-konten', 'img-static-content');
        $static_konten->slug = Str::slug($data['title']);
        $static_konten->save();
        return response()->json(['message' => "Berhasil Input Data"], 201);
    }

    // function update
    public function update(Request $request, $id = null)
    {
        $data = $request->all();
        $staticInfo = StaticKonten::find($id);

        if ($request->isMethod('GET')) {
            return response()->json($staticInfo, 200);
        } else {
            $images_file = $request->file('imagesFile');
            $image = new FilesHandling();
            if ($images_file) {
                $staticInfo->title = $data['title'];
                $staticInfo->desc = $data['desc'];
                $image->update($staticInfo->imagesFile, 'static-konten');
                $staticInfo->imagesFile = $image->upload($images_file, 'static-konten', 'img-static-content');
                $staticInfo->slug = Str::slug($data['title']);
                $staticInfo->update();
                return response()->json(['message' => "Berhasil Update Data"], 201);
            } else {
                $staticInfo->title = $data['title'];
                $staticInfo->desc = $data['desc'];
                $staticInfo->slug = Str::slug($data['title']);
                $staticInfo->update();
                return response()->json(['message' => "Berhasil Update Data"], 201);
            }
        }
    }

    // function delete
    public function delete($id)
    {
        $staticInfo = StaticKonten::find($id);
        $image = new FilesHandling();
        $image->update($staticInfo->imagesFile, 'static-konten');
        $staticInfo->delete();
        return response()->json(['message' => "Berhasil Menghapus Data"], 201);
    }
}
