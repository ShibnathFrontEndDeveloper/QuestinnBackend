<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicle_type';

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


}
