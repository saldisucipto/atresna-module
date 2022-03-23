<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyInfo;
use App\Http\Classes\FilesHandling;

class CompanyInfoController extends Controller
{
    // function show company info
    public function getCompanyInfo()
    {
        $companyInfo = CompanyInfo::find(1);
        if ($companyInfo == null) {
            return response()->json(['message', 'Company Info Kosong'], 200);
        } else {
            return response()->json($companyInfo, 200);
        }
    }

    // function edit company info
    public function editCompanyInfo(Request $update)
    {
        $companyInfo = CompanyInfo::find(1);
        $data = $update->all();
        $image = $update->file('company_image_logo');
        $file_images = new FilesHandling;
        if ($image) {
            $companyInfo->company_name = $data['company_name'];
            $companyInfo->company_phone = $data['company_phone'];
            $companyInfo->company_wa_number = $data['company_wa_number'];
            $companyInfo->company_email = $data['company_email'];
            $file_images->update($companyInfo->company_image_logo, 'company-logo');
            $companyInfo->company_image_logo = $file_images->upload($update->files('images'), 'logo-images', 'logo-images');
            $companyInfo->company_address = $data['company_address'];
            $companyInfo->save();
            return response()->json(['message' => 'Update Data Berhasil'], 201);
        } else {
            $companyInfo->company_name = $data['company_name'];
            $companyInfo->company_phone = $data['company_phone'];
            $companyInfo->company_wa_number = $data['company_wa_number'];
            $companyInfo->company_email = $data['company_email'];
            $companyInfo->company_address = $data['company_address'];
            $companyInfo->save();
            return response()->json(['message' => 'Update Data Berhasil'], 201);
        }
    }
}
