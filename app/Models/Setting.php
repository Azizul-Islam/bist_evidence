<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['company_logo','footer_logo','favicon','company_name','company_webist','address','phone','email','copyright','facebook','gamil','twitter','linkedin','instagram','youtube'];
}
