<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','description','price','photo','size','category_id','sub_category_id','area_id','sub_area_id','status','consumer','address','purpose'];
}
