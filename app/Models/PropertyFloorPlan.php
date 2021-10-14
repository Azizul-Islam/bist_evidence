<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFloorPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'floor_name',
        'floor_description',
        'floor_size',
        'floor_room',
        'floor_bath',
        'floor_photo'
    ];

   
}
