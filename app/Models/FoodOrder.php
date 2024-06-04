<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodOrder_details;
use App\Models\Room;
use App\Models\User;

class FoodOrder extends Model
{
    use HasFactory;

    protected $table = 'food_order';

    public function food_orders_dtails(){
        return $this->hasMany(FoodOrder_details::class,'order_id', 'id');
    }

    public function rooms_id(){
        return $this->belongsTo(Room::class,'room_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class,'cust_id', 'id');
    }

    

}
