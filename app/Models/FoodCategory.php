<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Foods;

class FoodCategory extends Model
{
    use HasFactory;

    protected $table = 'food_category';

    public function foods()
    {
        return $this->hasMany(Foods::class, 'foodcategory_id', 'id');//foreign key and local key
    }
}
