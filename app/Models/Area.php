<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = ['name','parent_id','status','slug'];

    public function child()
    {
        return $this->hasMany(Area::class,'parent_id');
    }

    public function allChild()
    {
        return $this->child()->with('child');
    }


    public function parent(){
        return $this->belongsTo(static::class,'parent_id')->with('parent');
    }


    public static function getAreas($latest = null){
        $data = static::whereNull('parent_id')->with('allChild');
        return $latest ? $data->latest('id')->get():$data->get();
    }

    public static function generateAreas($data = null, $spaces = null){
        $allAreas = $data ? $data:static::getAreas();
        $outputs = [];
        foreach ($allAreas as $area) {
            $area->name = ($spaces ? $spaces."→&nbsp;":"").$area->name;
            $outputs[] = $area;
            if(!blank($area->allChild)){
                $spacesAdd = $spaces."&nbsp;&nbsp;";
                $childArr = static::generateAreas($area->allChild,$spacesAdd);
                $outputs = array_merge($outputs,$childArr);
            }
        }
        return $outputs;
    }


    public static function getChildAreaByParentId($id)
    {
        return Area::where('parent_id',$id)->pluck('name','id');
    }
}
