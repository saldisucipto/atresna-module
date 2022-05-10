<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // make seeder COmpany Info
        DB::table('company_info')->insert([
            'company_name' => 'PT.BERKAH SELALU SEJAHTERA',
            'company_phone' => '08557541551',
            'company_wa_number' => '08557541551',
            'company_email' => 'companyemail@email.com',
            'company_image_logo' => '/path/images/images.png',
            'company_address' => 'Jl. Company Alamat, Jakarta Barat, DKI Jakarta - 11710',
        ]);
    }
}
