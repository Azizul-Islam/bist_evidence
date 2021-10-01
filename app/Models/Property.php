<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','description','price','photo','size','category_id','sub_category_id','area_id','sub_area_id','status','consumer','address','purpose'];

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
