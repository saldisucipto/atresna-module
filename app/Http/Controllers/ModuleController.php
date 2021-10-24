<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleController extends Controller
{
    // guarded
    public function __construct()
    {
        $this->middleware('auth:user_module');
    }
    // index function
    public function index(){
        return view('pages.dashboard.module_dashboard');
    }
}
