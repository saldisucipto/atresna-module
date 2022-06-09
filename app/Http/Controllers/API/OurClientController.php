<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurCient;
use App\Http\Classes\FilesHandling;
use Str;

class OurClientController extends Controller
{
    // index function
    public function index(Request $request){
        $data = $request->all();
        $logoParsing = $request->file('logo');
        if($request->isMethod('GET')){
            $ourClient = OurCient::get()->all();
            if(empty($ourClient)){
                $ourClient = [];
            }
            return response()->json($ourClient, 200);
        } else if ($request->isMethod('POST')){
            $createData = new OurCient();
            $createData->nama_customer = $data['nama_customer'];
            $createData->slugs = Str::slug($data['nama_customer']);
            $createData->alamat = $data['alamat'];
            if($logoParsing){
                $file = new FilesHandling();
                $createData->logo = $file->upload($logoParsing, 'logo-client', 'client-logo');
            }else{
                $createData->logo = 'logo-client';
            }
            $createData->description = $data['description'];
            $createData->save();
            return response()->json(['data' => $data, 'message' => 'Berhasil Menambahkan Data'], 201);
        }
    }

    // update function
    public function update(Request $req, $slugs = null){
        $data = $req->all();
        $logoParsing = $req->file('logo');
        $ourClientData = OurCient::find($slugs);
        $file = new FilesHandling();
        if($req->isMethod('POST')){
            $ourClientData->nama_customer = $data['nama_customer'];
            $ourClientData->slugs = Str::slug($data['nama_customer']);
            $ourClientData->alamat = $data['alamat'];
            if($logoParsing){
                $file->update($ourClientData->logo, 'logo-client');
                $ourClientData->logo = $file->upload($logoParsing, 'logo-client', 'client-logo');
            }else{
                $ourClientData->logo = 'logo-client';
            }
            $ourClientData->description = $data['description'];
            $ourClientData->update();
            return response()->json(['data' => $data, 'message' => 'Berhasil Merubah Data'], 201);
        }else {
            $file->update($ourClientData->logo, 'logo-client');
            $ourClientData->delete();
            return response()->json(['data' => $data, 'message' => 'Berhasil Menghapus Data'], 201);
        }
    }
}
