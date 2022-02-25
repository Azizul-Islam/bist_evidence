<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','address','description','price_start','price_end','amenities','project_status','status','photo'];

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
}
