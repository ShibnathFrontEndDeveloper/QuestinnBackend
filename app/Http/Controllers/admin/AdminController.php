<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard(){
        // $now = Carbon::now()->toArray();
        // $cYesterday  = Carbon::yesterday()->toArray();
        // $todays      = $now['year'].'-'.$now['month'].'-'.$now['day'];
        // $yesterday   = $cYesterday['year'].'-'.$cYesterday['month'].'-'.$cYesterday['day'];

        // //order section start
        // $totalOrder  = Order::count();
        // $todaysOrder = Order::whereDate('created_at',$todays)->count();
        // $yesterdayOrders = Order::whereDate('created_at',$yesterday)->count() > 0?Order::whereDate('created_at',$yesterday)->count() : 1;
        // $till_yesterday  = Order::whereDate('created_at','<=',$yesterday)->count();
        // $growthOrder = $todaysOrder > 0?($todaysOrder / $yesterdaysOrder)*100 - 100 : 0;
        // // end order section

        // //sales section start
        // $data['total_sales'] = Order::sum('sub_total');
        // $data['todays_sales'] = Order::whereDate('created_at',$todays)->sum('sub_total');
        // $data['yesterdays_sales'] = Order::whereDate('created_at',$yesterday)->sum('sub_total')?Order::whereDate('created_at',$yesterday)->sum('sub_total') : 1;
        // $data['sales_growth'] = $data['todays_sales'] > 0?($data['todays_sales'] / $data['yesterdays_sales'])*100 - 100 : 0;
        // //sales section end

        // //customer section start
        // $customer['total_users'] = User::count();
        // $customer['todays_user'] = User::whereDate('created_at',$todays)->count();
        // $customer['yesterdays_users'] = User::whereDate('created_at',$yesterday)->count() > 0?User::whereDate('created_at',$yesterday)->count() : 1;
        // $customer['customer_growth'] = $customer['todays_user'] > 0?($customer['todays_user'] / $customer['yesterdays_users'])*100 - 100 : 0;
        // //customer section end
        // return view('admin.admin-views.dashboard',compact('totalOrder','todaysOrder','growthOrder','data','customer'));
        return view('admin.admin-views.dashboard');
    }
}
