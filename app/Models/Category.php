<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','parent_id','slug','status'];

    public function child()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function allChild()
    {
        return $this->child()->with('child');
    }


    public function parent(){
        return $this->belongsTo(static::class,'parent_id')->with('parent');
    }


    public static function getCategories($latest = null){
        $data = static::whereNull('parent_id')->with('allChild');
        return $latest ? $data->latest('id')->get():$data->get();
    }

    public static function generateCategories($data = null, $spaces = null){
        $allCategories = $data ? $data:static::getCategories();
        $outputs = [];
        foreach ($allCategories as $category) {
            $category->name = ($spaces ? $spaces."→&nbsp;":"").$category->name;
            $outputs[] = $category;
            if(!blank($category->allChild)){
                $spacesAdd = $spaces."&nbsp;&nbsp;";
                $childArr = static::generateCategories($category->allChild,$spacesAdd);
                $outputs = array_merge($outputs,$childArr);
            }
        }
        return $outputs;
    }

    public static function getChildCategoryByParentId($id)
    {
        return Category::where('parent_id',$id)->pluck('name','id');
    }
}
