<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';

    protected $fillable = [
    'user_id','profile_img','home_address','home_address2','home_street','home_area',
    'home_city','home_district','home_state','home_pinCode','home_marker','home_lat','home_long',
    'work_marker','work_lat','work_long','work_address','work_address2','work_street','work_area',
    'work_city','work_district','work_state','work_state','work_pincode',
    ];
    
    
}
