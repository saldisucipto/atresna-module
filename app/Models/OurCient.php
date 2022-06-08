<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCient extends Model
{
    use HasFactory;
    protected $table = 'our_cient';
    protected $primaryKey = 'slugs';

    public $incrementing = false;
    protected $keyType = 'string';
}
