<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    //index function
    public function index(){
        $data = Contact::get()->all();
        return response()->json($data, 200);
    }

    // create function
    public function create(Request $request){
        $data = $request->all();
        $contact = new Contact();
        $contact->nama = $data['nama'];
        $contact->email = $data['email'];
        $contact->description = $data['description'];
        $contact->save();
        return response()->json(['data' => $data, 'message'=> 'Berhasil Input Data'], 201);
    }


    public function delete(Request $request, $id = null){
        $contact = Contact::find($id);
        if($request->isMethod('DELETE')){
            $contact->delete();
            return response()->json($contact, 201);
        }else{
            return response()->json($contact, 201);
        }
    }
}
