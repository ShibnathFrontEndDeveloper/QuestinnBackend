<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\User;
use App\Models\Facilities;
use App\Models\FoodOrder;
use App\Models\FoodOrder_details;
use App\Models\Rating;
use Validator;

class profileController extends Controller
{
    public function profile(){
        // dd(Auth::User()->id);
        $user = User::find(Auth::User()->id);        
        
        return view('user.profile',compact('user'));
    }

    public function edit_profile(Request $request){
        $user = User::find(Auth::User()->id);
        if($request->hasfile('id_proff')){
            $name = time().'_'.rand(999,9999).'.'.$request->id_proff->extension();
            $request->id_proff->move(public_path('storage/profile'), $name);  
        }else {
            $name = $user->picture;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone;
        $user->id_name = $request->id_name;
        $user->picture = $name;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();

        toastr()->success('Profile updated successfully');
        return redirect()->back();
    }

    public function room_details(){
        $roomOrders = Order::where('user_id',Auth::User()->id)->get();
        $facilities = Facilities::all();
        return view('user.room_details',compact('roomOrders','facilities'));
    }

    public function food_details(){
        $user = User::find(Auth::User()->id);
        // $order = FoodOrder_details::with('food_orders')->where('user_id',Auth::User()->id)->get();       
        $order = FoodOrder::with('food_orders_dtails')->where('cust_id',Auth::User()->id)->get();
        return view('user.food_details',compact('user','order'));
    }
    
    public function rate_us(Request $request){
        $validator = $request->validate([
            'inlineRadioOptions'  => 'required',
                                 
        ],[      
            'name.required' => 'please choose one',
        ]);
        
        $ratings = new Rating();
        $ratings->user_id = Auth::User()->id;
        $ratings->ratings = $request->inlineRadioOptions;
        $ratings->save();
        
        toastr()->success('Thank you, we received your rating');
        return redirect()->back();
    }
}
