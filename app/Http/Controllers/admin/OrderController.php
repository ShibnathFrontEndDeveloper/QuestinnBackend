<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Room;
use App\Models\RoomNo;
use App\Models\FoodCategory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Validator;

class OrderController extends Controller
{
    public function list($status){

        if($status == 'all'){
            $order = Order::orderBy('id', 'desc')->get();
        }else {
            $order = Order::where('status',$status)->orderBy('id', 'desc')->get();
        }
        return view('admin.admin-views.orders.rooms.list',compact('order'));
        
    }

    public function order_details($orderId){
        $order = Order::where('id',$orderId)->first();
        $add = json_decode($order->addition_id,true);
        $options = array();
        foreach($add as $keys => $values){
            $sql = Addition::where('id',$values)->first();
            array_push($options,$sql->package_title);
        }
        return view('admin.admin-views.orders.order_details',compact('order','options'));
    }

    public function status(Request $request){
               
        $status = Order::where('id',$request['id'])->update([
            'status' => $request['order_status'],           
            'updated_at'   => now(),
        ]);
        
        $user_id = Order::where('id',$request['id'])->pluck('user_id')->first();
        User::where('id',$user_id)->update([
            'check_in_status' => 1
        ]);

        if($status == 1){
            return response()->json([
                'success' => 1,                
            ]); 
            // toastr()->success('status chhanged successfully');
            // return redirect()->back();
        }else {
            return response()->json([
                'success' => 0,                
            ]);
        }
    }
    
    public function paid_status(Request $request){
        $status = Order::where('id',$request['id'])->update([
            'paid_status' => $request['paid_status'],           
            'updated_at'   => now(),
        ]); 

        if($status == 1){
            return response()->json([
                'success' => 1,                
            ]); 
            // toastr()->success('status chhanged successfully');
            // return redirect()->back();
        }else {
            return response()->json([
                'success' => 0,                
            ]);
        }
    }

    public function assign_room_no(Request $request){
        
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        
        $roomNumbers = Order::where('room_id', $request->data)
        ->where(function ($query) use ($fromDate, $toDate) {
            $query->whereBetween('from_date', [$fromDate, $toDate])
                  ->orWhereBetween('to_date', [$fromDate, $toDate])
                  ->orWhere(function ($query) use ($fromDate, $toDate) {
                      $query->where('from_date', '<=', $fromDate)
                            ->where('to_date', '>=', $toDate);
                  });
        })
        ->pluck('room_no')
        ->toArray();
        
        // Remove null values from the array and extract values from square brackets
        $roomNumbers = array_map(function ($value) {
            if ($value !== null) {
                // Extract room number from square brackets
                return trim($value, "[]");
            }
        }, $roomNumbers);
        
        // Remove null values from the array
        $roomNumbers = array_filter($roomNumbers, function ($value) {
            return !is_null($value);
        });

        
        $room = Room::where('id',$request->data)->first();
        // Fetch room numbers
        $room_no = RoomNo::where('room_id', $request->data)
            ->whereNotIn('room_no', $roomNumbers)
            ->get(['room_no']);
        
        $order_id = $request->orderId;
        return response()->json([
            'success' => 1,
            'view' => view('admin.admin-views.modal.assign_modal',compact('room','room_no','order_id'))->render(),
        ]);             
    }

    public function assign_roomNo(Request $request){       
        $validator = Validator::make($request->all(),[
            'room_no'  => 'required',                       
        ],[      
            'room_no.required' => 'Select checkboxes'                         
        ]);
        $user_id = Order::where('id',$request->order_id)->pluck('user_id')->first();
        foreach($request->room_no as $keys => $values){
            DB::table('room_no')->where('room_id',$request->room_id)->where('room_no',$values)->update([
                'user_id' => $user_id,
                'status' => 'booked',              
                'updated_at' => now(),
            ]);                        
        }
        Order::where('id',$request->order_id)->update([
            'room_no' => json_encode($request->room_no),
            'updated_at' => now(),
        ]);

        toastr()->success('Room Assigned');
        return redirect()->back();
        
    }

    public function place_order_view(){
        $categories = FoodCategory::all();
        $rooms = Room::where('available_rooms','!=',0)->get();
        return view('admin.admin-views.orders.rooms.addOrder',compact('categories','rooms'));
    }

    public function room_change(request $request){
        $rooms = Room::where('id',$request->id)->first();
        return response()->json([
            'msg' => 'successful',
            'data' => $rooms 
        ]);
    }

    public function store(Request $request){
                
        $validator = Validator::make($request->all(),[
            'name'  => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'id_name' => 'required',
            'phone' => 'required|string',            
            'check_in' => 'required|string',
            'check_out' => 'required|string',           
            'room' => 'required|string',           
            'adults' => 'required|string',           
            'childrens' => 'required|string',           
            'quantity' => 'required|string',           
            'amount' => 'required|string',           
            'address' => 'required',            
            'id_proff' => 'required',            
        ],[      
            'name.required' => 'email is required',
            'email.required' => 'email is required',              
            'mobile.required' => 'phone number is required',  
            'id_name.required' => 'Id name is required',    
            'address.required' => 'address is required',             
            'check_in.required' => 'check_in is required',             
            'check_out.required' => 'check_out is required',             
            'room.required' => 'room is required',             
            'adults.required' => 'adults is required',             
            'childrens.required' => 'childrens is required',             
            'quantity.required' => 'quantity is required',             
            'amount.required' => 'amount is required',                                
            'id_proff.required' => 'image is required',             
        ]);

        $user = User::where('email',$request->email)->first();
        $rooms = Room::where('id',$request->room)->first();
        $rooms->no_room_booked = $request->quantity;
        $rooms->available_rooms = $rooms->room_quantity - $request->quantity;
        $rooms->save();        
        if(!$user){
            $imageName = time().'_'.rand(999,9999).'.'.$request->id_proff->extension();  
            $request->id_proff->move(public_path('storage/profile'), $imageName);
            $user = new User();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->phone_no = $request->phone;
            $user->id_name  = $request->id_name;
            $user->picture  = $imageName;
            $user->address  = $request->address;
            $user->password = Hash::make(12345); 
            $user->save();           
        }

        $order = new Order();
        $order->user_id      = $user->id;
        $order->from_date    = $request->check_in;
        $order->to_date      = $request->check_out;
        $order->room_id      = $request->room;
        $order->quantity     = $request->quantity;
        $order->groos_amount = $rooms->price;
        $order->discount     = '';
        $order->nett_amount  = $rooms->price;
        $order->adults       = $request->adults;
        $order->childrens    = $request->childrens;
        $order->payment_method  = '';
        $order->paid_status  = 'paid';
        $order->status       = 'confirmed';   
        $order->save();        
        
        toastr()->success('Booked successfully');
        return redirect()->back();


    }
}
