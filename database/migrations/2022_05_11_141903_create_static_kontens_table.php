<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticKontensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_konten', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->text('desc');
            $table->string('imagesFile')->nullable();
            $table->enum('konten_untuk', ['HeroKonten', 'IsiKonten']);
            $table->string('slug')->unique();
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
        Schema::dropIfExists('static_konten');
    }
}
