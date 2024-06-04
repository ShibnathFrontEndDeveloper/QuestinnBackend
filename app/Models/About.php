<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about';

    protected $fillable = [
        'id','title','heading','image','room_no','customer_no','review_no','staff_no','description',
        'rooms_icon','customers_icon','reviews_icon','staffs_icon'
    ];
}
