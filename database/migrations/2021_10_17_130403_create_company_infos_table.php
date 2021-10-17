<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_info', function (Blueprint $table) {
            // $table->id();
            $table->char('id_company_info', 10)->primary();
            $table->string('company_name_info', 50);
            $table->mediumText('company_address_info');
            $table->mediumText('company_address_info_1')->nullable();
            $table->mediumText('company_taxt_address_info');
            $table->char('company_tax_number_info', 15);
            $table->string('company_website_info', 50);
            $table->char('company_phone_info', 13);
            $table->char('company_phone_info_1', 13)->nullable();
            $table->string('company_email_info', 50);
            $table->string('company_logo_info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_info');
    }
}
