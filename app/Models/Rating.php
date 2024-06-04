<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';
    
     public function users(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }

            
}