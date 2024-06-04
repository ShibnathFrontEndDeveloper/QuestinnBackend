<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodOrder;
use App\Models\RoomNo;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    public function foods(){
        return $this->hasMany(FoodOrder::class,'room_id', 'id');
    }
    
    public function room_no(){
        return $this->hasMany(RoomNo::class,'room_id', 'id');
    }
}
