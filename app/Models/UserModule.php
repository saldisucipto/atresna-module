<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModule extends Model
{
    protected $table = 'user_module';
    protected $primaryKey = 'id_user_module';
    public $incrementing = false;
    use HasFactory;
}
