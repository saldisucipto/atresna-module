<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'slugs';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    public function kategoriProduct()
    {
        return $this->hasOne(KategoriProduk::class, 'slugs', 'id_kat_produk');
    }

    public function imagesGallery()
    {
        return $this->hasMany(ImagesProduk::class, 'id_produk', 'slugs');
    }
}