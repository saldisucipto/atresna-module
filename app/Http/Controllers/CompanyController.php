<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use app\Models\CompanyInfo;
use App\Models\CompanyInfo;
use App\Classes\Files;
use App\Classes\Penomoran;

class CompanyController extends Controller
{
    // index function
    public function index(Request $request)
    {
        # code...
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $cretaeCompany = new CompanyInfo();
            $imagesFiles = new Files;
            $nomorID = new Penomoran();
            $nomorTerakhir = CompanyInfo::latest()->first();
            $lastId = $nomorTerakhir->id_company_info;
            // echo($nomorTerakhir->id_company_info);
            // die;
            $cretaeCompany->id_company_info = $nomorID->numbering('CI', $lastId);
            $cretaeCompany->company_name_info = $data['company_name_info'];
            $cretaeCompany->company_phone_info = $data['company_phone_info'];
            $cretaeCompany->company_email_info = $data['company_email_info'];
            $cretaeCompany->company_address_info = $data['company_adress_info'];
            $cretaeCompany->company_logo_info = $imagesFiles->uploadImage($request->file('company_logo_info'), 'company-info', 'company-name-info');
            $cretaeCompany->save();
            return redirect('/company/user-info')->with('message', 'Berhasil Installasi Project !');
        }
        return view('pages.intro.index');
    }

    public function userInfo(Request $request)
    {
        # code...
        return view('pages.intro.user');
    }
}
