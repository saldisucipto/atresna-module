<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_module', function (Blueprint $table) {
            $table->char('id_user_module', 10)->primary();
            $table->char('id_company_info', 10);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('user_role', ['administrator','admin','user']);
            $table->rememberToken();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
            $table->foreign('id_company_info')->references('id_company_info')->on('company_info')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_module');
    }
}
