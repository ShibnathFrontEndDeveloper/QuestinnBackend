<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RestaurantDetails;

class Restaurants extends Model
{
    use HasFactory;

    protected $table = 'restaurant';

    public function restaurant_details(){
        return $this->hasMany(RestaurantDetails::class,'restaurant_id', 'id');
    }
    
}
