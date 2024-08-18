<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\FoodOrder;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard(){
        $totalOrder  = Order::count();
        $foodOrder = FoodOrder::count();
        $sales = Order::where('paid_status','paid')->sum('groos_amount');
        $customer = User::count();
        return view('admin.admin-views.dashboard', compact('totalOrder','foodOrder','sales','customer'));
    }
}
