<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\User;

class RatingController extends Controller
{
    public function list(){
        $ratings = Rating::With('users')->get();
        return view('admin.admin-views.ratings.list',compact('ratings'));  
    }
    
}