<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;

class ProdukController extends Controller
{
    // kategori produk
    public function  kat_index(Request $req){
        if($req->isMethod('get')){
            $data = KategoriProduk::get()->all();
            if(empty($data)){{
                 return response()->json(['data' => 'Belum Ada Datanya', 'message' => 'berhasil memperoleh data'], 200);
            }}
            return response()->json(['data' => $data, 'message' => 'berhasil memperoleh data'], 200);
        }else{
            $dataParsing = $req->all();
        }

    }
}
