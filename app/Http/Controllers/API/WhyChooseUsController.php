<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use App\Http\Classes\FilesHandling;
use Str;
use Illuminate\Support\Facades\Validator;

class WhyChooseUsController extends Controller
{
    // show data why choose us
    public function index()
    {
        $data = WhyChooseUs::get()->all();
        if (empty($data)) {
            $data = [];
        }
        return response()->json(['data' => $data, 'message' => 'Berhasil Memperoleh Data'], 200);
    }

    // create data
    public function create(Request $request)
    {
        $data = $request->all();
        $images = $request->file('images');

        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $whyChooseUs = new WhyChooseUs;
        $whyChooseUs->title = $data['title'];
        $whyChooseUs->slugs = Str::slug($data['title']);
        $whyChooseUs->description = $data['description'];
        if ($images) {
            $fileHandling = new FilesHandling();
            $whyChooseUs->images = $fileHandling->upload($images, 'why', 'why-choose-us');
        }
        $whyChooseUs->save();
        return response()->json(['data' => $data, 'message' => 'Berhasil Membuat Data Baru'], 201);
    }

    // update
    public function update(Request $update, $slugs = null)
    {
        $data = $update->all();
        $db = WhyChooseUs::find($slugs);
        $images = $update->file('images');

        if ($update->isMethod('GET')) {
            return response()->json($db, 200);
        } elseif ($update->isMethod('POST')) {
            $db->title = $data['title'];
            $db->slugs = Str::slug($data['title']);
            $db->description = $data['description'];
            if ($images) {
                $fileHandling = new FilesHandling();
                $fileHandling->update($db->images, 'why');
                $db->images = $fileHandling->upload($images, 'why', 'why-choose-us');
            }
            $db->update();
            return response()->json(['data' => $data, 'message' => 'Berhasil Membuat Data Baru'], 201);
        }
    }

    public function delete(Request $del, $slugs = null)
    {
        $db = WhyChooseUs::find($slugs);
        $fileHandling = new FilesHandling();
        $fileHandling->update($db->images, 'why');
        $db->delete();
        return response()->json(['data' => $db, 'message' => 'Berhasil Menghapus Data'], 201);
    }
}
