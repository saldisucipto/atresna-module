<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    //craete function
    public function create(Request $request)
    {
        $data = $request->all();
        return response()->json(['message' => "Berhasil Input Data"], 201);
    }
}
