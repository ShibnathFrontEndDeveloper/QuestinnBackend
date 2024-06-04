<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodCategory;

class Foods extends Model
{
    use HasFactory;
    protected $table = 'food';

    public function category()
    {
        return $this->belongsTo(FoodCategory::class,'foodcategory_id', 'id');// foreign key and local key
    }
}
