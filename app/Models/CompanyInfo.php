<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    protected $table = 'company_info';
    protected $primaryKey = 'id_company_info';
    public $incrementing = false;
    use HasFactory;
}
