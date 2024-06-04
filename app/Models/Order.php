<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\User;
use App\Models\Room;
use App\Models\Packages;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function users(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function rooms(){
        return $this->belongsTo(Room::class,'room_id', 'id');
    }
            
}
