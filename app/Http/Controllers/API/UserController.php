<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Get All Info User
     */
    public function index()
    {
        $data = User::get()->all();
        return response()->json($data, 200);
    }

    public function show(Request $request, $id=null)
    {
        $data = User::find($id);
        if ($request->isMethod('get')) {
            return response()->json($data, 200);
        } elseif ($request->isMethod('DELETE')) {
            $data->delete();
            return response()->json(['message' => 'Berhasil Dihapus'], 200);
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'user_role' => 'required',
        ], );

        if ($validator->fails()) {
            return response()->json(['message' => $validator], 400);
        }

        $dataInput = $request->all();
        $user = new User();
        $user->name = $dataInput['name'];
        $user->email = $dataInput['email'];
        $user->user_role = $dataInput['user_role'];
        $user->password = Hash::make($dataInput['password']);
        $user->save();
        return response()->json(['message' => 'Berhasil Input User Baru'], 201);
    }

    // function update
    public function update(Request $request, $id = null)
    {
        $dataInput = $request->all();
        $user = User::find($id);
        $user->name = $dataInput['name'];
        $user->email = $dataInput['email'];
        $user->user_role = $dataInput['user_role'];
        if ($request->password) {
            $user->password = Hash::make($dataInput['password']);
        } else {
            $user->password = $user->password;
        }
        $user->save();
        return response()->json(['message' => 'Berhasil Input Update User'], 201);
    }
}
