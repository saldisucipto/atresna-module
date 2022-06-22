<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->string('slugs')->primary();
            $table->string('id_kat_produk');
            $table->string('nama_produk',100);
            $table->text('deskripsi_produk');
            $table->string('link_produk_tokopedia');

            $table->foreign('id_kat_produk')->references('slugs')->on('kategori_produk');
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
        Schema::dropIfExists('produk');
    }
}
