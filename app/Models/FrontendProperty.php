<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendProperty extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','phone','area_id','sub_area_id','category_id','consumer','purpose','status'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function sub_area()
    {
        return $this->belongsTo(Area::class,'sub_area_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sub_category()
    {
        return $this->belongsTo(Category::class,'sub_category_id');
    }
}
