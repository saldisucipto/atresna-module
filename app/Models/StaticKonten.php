<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticKonten extends Model
{
    use HasFactory;
    protected $table = 'static_konten';
    protected $guarded = [];
}
