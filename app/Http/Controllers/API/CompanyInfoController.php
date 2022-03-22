<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyInfo;

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
        return response()->json($update, 201);
    }
}
