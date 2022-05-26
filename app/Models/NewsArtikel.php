<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsArtikel extends Model
{
    use HasFactory;
    protected $table = 'news_artikel';
    protected $primaryKey = 'slugs';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];
}
