<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'previous_price',
        'price',
        'category_id',
        'sub_category_id',
        'purpose',
        'completion_status',
        'area_id',
        'sub_area_id',
        'address',
        'street',
        'zip_code',
        'bedroom',
        'bathroom',
        'garage',
        'size',
        'year_built',
        'video_link',
        'user_id',
        'is_featured',
        'status',
        'consumer',
        'contract'
    ];

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

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class,'property_amenities');
    }

    public function floorPlans()
    {
        return $this->hasMany(PropertyFloorPlan::class);
    }

    public function features()
    {
        return $this->hasMany(PropertyFeature::class);
    }
}
