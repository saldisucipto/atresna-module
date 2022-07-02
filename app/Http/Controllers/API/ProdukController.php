<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
use Str;
use App\Http\Classes\FilesHandling;

>>>>>>> 7b62142ea3c0186ba06535c72e26e3843d7e2d16

class ProdukController extends Controller
{
    // kategori produk
    public function kat_index(Request $req)
    {
        if ($req->isMethod('get')) {
            $data = KategoriProduk::get()->all();
            if (empty($data)) {{
                return response()->json(['data' => 'Belum Ada Datanya', 'message' => 'berhasil memperoleh data'], 200);
            }}
            return response()->json(['data' => $data, 'message' => 'berhasil memperoleh data'], 200);
        } else {
            $dataParsing = $req->all();
            $fileHandling = new FilesHandling();
            $katProduk = new KategoriProduk();
            $katProduk->slugs = Str::slug($dataParsing['nama_kat_produk']);
            $katProduk->nama_kat_produk = $dataParsing['nama_kat_produk'];
            $katProduk->deskripsi_kat_produk = $dataParsing['deskripsi_kat_produk'];
            $katProduk->images_kat_produk = $fileHandling->upload($req->file('images_kat_produk'), 'kategori-produk', 'IMG-KAT-PRODUK');
            $katProduk->save();
            return response()->json(['data' => $dataParsing, 'message' => 'berhasil Membuat data'], 201);
        }
    }
    // update dan get Sepesial Data
    public function updateData(Request $req, $slugs = null){
        $data = FilesHandling::find($slugs);
    }
}
