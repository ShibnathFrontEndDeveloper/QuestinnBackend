<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurants;

class RestaurantDetails extends Model
{
    use HasFactory;

    protected $table = 'restaurant_details';

    public function restaurant(){
        return $this->belongsTo(Restaurants::class,'restaurant_id', 'id');
    }
}
