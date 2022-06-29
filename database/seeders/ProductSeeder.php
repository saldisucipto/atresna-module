<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Produk;
use Faker\Factory as Faker;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Menentukan data loclization
       $faker = Faker::create('id_ID');
       for($i = 1; $i <= 200; $i++){
        // insret to table
        DB::table('produk')->insert([
            'slugs' => "'Product-$i'",
            'id_kat_produk' => "'slugs-slugs'",
            'nama_produk' => "'Nama Product $i'",
            'deskripsi_produk' => "'Deskripsi Product $i'",
            'link_produk_tokopedia' => "'Link Produk'",
        ]);
       }
    }
}
