<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foods;
use App\Models\FoodOrder;
use App\Models\Banner;
use App\Models\FoodOrder_details;
use App\Models\RoomNo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class OrderController extends Controller
{
    public function food_booking(Request $request){     
        
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            foreach($cart as $keys => $cartItems){
                if($cartItems['product_id'] == $request->product_id){
                    return response()->json([
                        'msg' => 0,           
                    ]);
                }
            }
        }else {
            $cart = [];
        }
        
        $data = [
            'user_id' => Auth::User()->id,
            'product_id' => $request->product_id,
            'amount' => $request->amount,
            'quantity' => $request->quantity,                    
        ]; 
        // $data->push($cart);
        array_push($cart,$data);
        $request->session()->put('cart', $cart);              
        return response()->json([
            'msg' => 'successfull',           
        ]);
    }

    public function food_for_room(Request $request){
        $user_data = User::select('room_id')->where('id',$request->user_id)->where('check_in_status',1)->pluck('room_id')->first();
        $roomNO = RoomNo::where('room_id',$user_data)->where('status','booked')->where('user_id',$request->user_id)->get();                        
        return response()->json([
            'msg' => 1,
            'view' => view('foodRoomnoModal',compact('roomNO'))->render(),
        ]);         
    }

    

    public function checkout_food(Request $request){
        $banner = Banner::where('section_name','checkout_details')->get();
        return view('food_details',compact('banner'));
    }

    public function food_payment(){
        $roomNo = DB::table('room_no')->where('user_id',Auth::User()->id)->where('room_id',Auth::User()->room_id)->first();
        if(isset($roomNo)){
            return view('food_payment',compact('roomNo'));
        }else {
            toastr()->error('Room No Not found Please contact Reception');
            return redirect()->back();
        }
        
    }

    public function food_payment_confirm(Request $request){
        
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'onlone'         => 'required',     
            'room_no'        => 'required',  
            'transaction_id' => 'required_if:onlone,online',
            'scrnshot'       => 'required_if:onlone,online', 
        ],[      
            'onlone.required' => 'Please choose payment method first!', 
            'transaction_id.required_if' => 'Please enter your UTR/UPI Transaction ID/Challan/Reference Number.',
            'scrnshot.required_if' => 'Please upload your payment screenshot.',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validation failed. Please check the form and try again.');
        }

        $subtotal = 0;
        $tax = 0;
        $discount = 0;     
        if(request()->session()->has('cart')){
            $cart = request()->session()->get('cart');
            $total_amount = 0;
        }
        
        foreach($cart as $cartKey => $cartValue) {
            $product = DB::table('food')->where('id',$cartValue['product_id'])->first(); 
            $subtotal += $cartValue['amount']; 
        }    
        
        $room_no = $request->room_no;
       
        $total = ($subtotal+$tax) - $discount;

        if($request->onlone == 'online'){
            
            if($request->file('scrnshot')){
                $file = $request->file('scrnshot');
                $imageName = time().'_'.rand(999,9999).'.'.$file->extension(); 
                $file->move(public_path('storage/food_scrnshots'), $imageName);
            }
            
            $order2 = new FoodOrder();
            $order2->cust_id    = Auth::User()->id;
            $order2->room_id     = Auth::User()->room_id;
            $order2->room_no     = $request->room_no;
            $order2->total_amount	= $total;
            $order2->payment_method = 'online';
            $order2->transaction_id = $request->transaction_id;
            $order2->scrn_shots     = $imageName;
            $order2->paid_status    = 'unpaid';
            $order2->order_status   = 'pending';
            $order2->save();    

            foreach($cart as $cartKey => $cartValue) {
                $product = DB::table('food')->where('id',$cartValue['product_id'])->first();

                $order = new FoodOrder_details();
                $order->order_id     = $order2->id;
                $order->user_id      = Auth::User()->id;
                $order->room_no      = $request->room_no;
                $order->foods_id	 = $cartValue['product_id'];
                $order->quantity     = $cartValue['quantity'];
                $order->discount     = $discount;
                $order->tax          = $tax;
                $order->amount       = $product->amount; 
                $order->total_amount = $product->amount * $cartValue['quantity']; 
                $order->save(); 
                
            }
            
            $request->session()->forget('cart');
            toastr()->success('A confirnmation mail sent to your email address after verification');
            return redirect('/');
        }
        elseif($request->onlone == 'cash'){
            $order2 = new FoodOrder();
            $order2->cust_id    = Auth::User()->id;
            $order2->room_id     = Auth::User()->room_id;
            $order2->room_no     = $request->room_no;
            $order2->total_amount	     = $total;
            $order2->payment_method     = 'cash';
            $order2->paid_status     = 'unpaid';
            $order2->order_status     = 'pending'; 
            $order2->save();    

            foreach($cart as $cartKey => $cartValue) {
                $product = DB::table('food')->where('id',$cartValue['product_id'])->first();


                $order = new FoodOrder_details();
                $order->order_id    = $order2->id;
                $order->user_id     = Auth::User()->id;
                $order->room_no     = $request->room_no;
                $order->foods_id	     = $cartValue['product_id'];
                $order->quantity     = $cartValue['quantity'];
                $order->discount     = $discount;
                $order->tax     = $tax;
                $order->amount     = $product->amount; 
                $order->total_amount     = $product->amount * $cartValue['quantity']; 
                $order->save();  
            }
            $request->session()->forget('cart');
            toastr()->success('A confirnmation mail sent to your email address after verification');
            return redirect('/');
        }
        else{
            toastr()->error('Please select valid payment method!');
            return redirect()->back();
        }
        
    }

    // public function food_payment_online(Request $request){
        
    //     $validator = Validator::make($request->all(),[
    //         'transaction_id'  => 'required',     
    //     ],[      
    //         'transaction_id.required' => 'Please enter your valid transaction id!',           
    //     ]);

    //     $subtotal = 0;
    //     $tax = 0;
    //     $discount = 0;     
    //     if(request()->session()->has('cart')){
    //         $cart = request()->session()->get('cart');
    //         $total_amount = 0;
    //     }
       
    //     foreach($cart as $cartKey => $cartValue) {
    //         // $product = DB::table('food')->where('id',$cartValue['product_id'])->first(); 
    //         $subtotal += $cartValue['amount']; 
    //     }     
       
    //     $total = ($subtotal+$tax) - $discount;

    //     $order1 = new FoodOrder();
    //     $order1->cust_id    = Auth::User()->id;
    //     $order1->room_id     = Auth::User()->room_id;
    //     $order1->room_no     = $request->room_no;
    //     $order1->total_amount	     = $total;
    //     $order1->payment_method     = 'QR Code';
    //     $order1->transaction_id     = $request->transaction_id;
    //     $order1->paid_status     = 'unpaid';
    //     $order1->order_status     = 'pending'; 
    //     $order1->save(); 

    //     foreach($cart as $cartKey => $cartValue) {

    //         $product = DB::table('food')->where('id',$cartValue['product_id'])->first(); 

    //         $order = new FoodOrder_details();
    //         $order->order_id    = $order1->id;
    //         $order->user_id     = Auth::User()->id;
    //         $order->room_no     = $request->room_no;
    //         $order->foods_id	     = $cartValue['product_id'];
    //         $order->quantity     = $cartValue['quantity'];
    //         $order->discount     = $discount;
    //         $order->tax     = $tax;
    //         $order->amount     = $product->amount; 
    //         $order->total_amount     = $product->amount * $cartValue['quantity'];
    //         $order->save();  
    //     }

           
        
    //     toastr()->success('A confirnmation mail sent to your email address after verification');
    //     return redirect('/');


    // }

    public function remove_from_cart(Request $request){
        
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            $new_collection = [];                    
                foreach ($cart as $item) {                          
                    if ($item['product_id'] !=  $request->product_id) {
                        array_push($new_collection,$item);
                    }
                }                      
            $request->session()->put('cart', $new_collection);
            return response()->json([
                'msg' => '1',
                'status' => 'successful',           
            ]);    
        }   else {
                return response()->json([
                    'msg' => '0',           
                ]);
        }   

    }

    public function update_cart(Request $request){
        
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            $item_id_list = array_column($cart, 'product_id');                            
            if(in_array($request->product_id,$item_id_list)){               
                foreach ($cart as $key => $item) {                                       
                    if ($cart[$key]['product_id'] ==  $request->product_id) { 
                        $amount = Foods::where('id',$request->product_id)->pluck('amount')->first();                      
                        $cart[$key]["amount"] =  $amount*$request->quantity;                   
                        $cart[$key]["quantity"] =  $request->quantity;                                                                                     
                    }                   
                } 
            }
            
            $request->session()->put('cart', $cart); 
            return response()->json([
                'msg' => 1, 
                'data' => 'successfull'         
            ]);  
        }   else {
                return response()->json([
                    'msg' => 0,           
                ]);
        }   
    }

    public function food_order(Request $request){
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            $order_id = FoodOrder::orderBy('id', 'DESC')->pluck('id')->first() + 1;
            $user = User::find(Auth::User()->id); 
            $list_of_amount = array_column($cart, 'amount');
            $total_amount = array_sum($list_of_amount);
            $or = [
                'id' => $order_id,
                'cust_id' => $user->id,
                'room_id' => $user->room_id,
                'room_no' => $request->room_no,
                'total_amount' => $total_amount,
                'paid_status' => 'unpaid',
                'order_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),                
            ];

            $order_id = DB::table('food_order')->insertGetId($or);

            foreach ($cart as $items) {
                $product = Foods::where('id',$items['product_id'])->first();
                $or_d = [
                    'order_id' => $order_id,
                    'user_id' => $user->id,
                    'room_no' => $request->room_no,
                    'foods_id' => $items['product_id'],
                    'quantity' => $items['quantity'],
                    'amount' => $items['amount'],
                    'tax' => '',
                    'discount' => '',                
                    'total_amount' => $total_amount,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
                                                   
            }
            $request->session()->forget('cart'); 
            DB::table('foodorder_details')->insert($or_d);
            return response()->json([
                    'msg' => 1,           
            ]);
                        
        }else {
            return response()->json([
                'msg' => 0,           
            ]);
        }

        
    }
}
