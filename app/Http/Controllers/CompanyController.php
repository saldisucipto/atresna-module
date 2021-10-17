<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // index function
    public function index()
    {
        # code...
        return view('pages.intro.index');
    }
}
