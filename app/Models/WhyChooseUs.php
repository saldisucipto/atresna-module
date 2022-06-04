<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    use HasFactory;
    protected $table = 'why_choose_us';
    protected $primaryKey = 'slugs';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    protected $hidden = ['updated_at', 'created_at'];
}
