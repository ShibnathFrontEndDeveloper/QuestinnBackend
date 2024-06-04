<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodOrder;
use App\Models\Foods;
use App\Models\User;

class FoodOrder_details extends Model
{
    use HasFactory;

    protected $table = 'foodorder_details';

    public function food_orders(){
        return $this->belongsTo(FoodOrder::class,'order_id', 'id');
    }

    public function foods(){
        return $this->belongsTo(Foods::class,'foods_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
