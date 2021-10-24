<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyInfo;
use App\Models\UserModule;
use App\Classes\Files;
use App\Classes\Penomoran;
use Illuminate\Support\Facades\Hash;

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
            // echo($nomorTerakhir->id_company_info);
            // die;
            if ($nomorTerakhir) {
                $lastId = $nomorTerakhir->id_company_info;
            } else {
                $lastId = 0000;
            }
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

    public function userCreateAdministrator(Request $createUserAdmin){
        $data = $createUserAdmin->all();
        $nomorID = new Penomoran;
        $nomorTerakhir = UserModule::latest()->first();
        $nomorTerakhirci = CompanyInfo::latest()->first();
        if ($nomorTerakhir) {
            $lastId = $nomorTerakhir->id_company_info;
        } else {
            $lastId = 0000;
        }
        $userModel = new UserModule();
        $userModel->id_user_module = $nomorID->numbering('US', $lastId);
        $userModel->id_company_info = $nomorTerakhirci->id_company_info;
        $userModel->name = $data['name'];
        $userModel->email = $data['email'];
        $userModel->user_role = 'administrator';
        $userModel->password = Hash::make($data['password']);
        $userModel->save();
        return "Sucessfully Create User Administrator";

    }
}
