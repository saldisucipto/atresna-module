<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function login(Request $req)
    {
        if (!Auth::attempt($req->only('email', 'password'))) {
            return response()
            ->json(['message' => 'Unauthorized'], 401);
        }
        $user = Auth::user();
        $user->save();
        $token = $user->createToken('auth_token')->plainTextToken;
        $response = [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];

        return response()
            ->json($response, 200);
    }
}
