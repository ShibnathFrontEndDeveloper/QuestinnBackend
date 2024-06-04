<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Order;
use App\Models\AddOptions;

class OrderController extends Controller
{
    public function checkout_complete(Request $request){

        $validator = Validator::make($request->all(),[
            'txnid'            => 'required',
            'user_id'         => 'required',
            'add_options_list' => 'required',
            'package_id'       => 'required',
            'appointment_date' => 'required',
            'vehicle_type'     => 'required',
            'brand_name'       => 'required',
            'vehicle_model'    => 'required',
            'vehicle_color'    => 'required',
            'vehicle_no'       => 'required',
            'owner_name'       => 'required',
            'owner_phone'      => 'required',
            'order_status'     => 'required',
            'sub_total'        => 'required',
            'customer_address' => 'required',
            'payment_mode'     => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $add_options = array();
        if(isset($request->add_options_list)){
            foreach($request->add_options_list as $keys => $values){
                $add_options[] = $values['id'];
                $deleteAdd = AddOptions::where('user_id',auth('sanctum')->user()->id)->where('addOptions_id',$values['id'])->delete();
            }
        }
            
        $order = Order::orderBy('id','desc')->first();

        $orders = new Order();
        $orders->id             = 1000 + $order->id;
        $orders->trans_id       = $request->txnid;
        $orders->user_id        = $request->user_id;
        $orders->addition_id    = json_encode($add_options);
        $orders->package_id     = $request->package_id;
        $orders->appoint_date   = $request->appointment_date;
        $orders->vehicle_type   = $request->vehicle_type;
        $orders->order_status   = $request->order_status;
        $orders->sub_total      = $request->sub_total;
        $orders->cust_address   = $request->customer_address;
        $orders->payment_mode   = $request->payment_mode;
        $orders->brand_id       = $request->brand_name;
        $orders->vehicle_model  = $request->vehicle_model;
        $orders->vehicle_color  = $request->vehicle_color;
        $orders->vehicle_no     = $request->vehicle_no;
        $orders->owner_name     = $request->owner_name;
        $orders->owner_phone    = $request->owner_phone;
        $orders->save();

        return response()->json([
            'status' => 200,
            'id'                  => ($orders->id != null)?$orders->id:'',
            'user_id'             => ($orders->user_id != null)?$orders->user_id:'',
            'txnid'               => ($orders->trans_id != null)?$orders->trans_id:'',
            'add_options_list'    => ($orders->addition_id != null)?$orders->addition_id:'',
            'appointment_date'    => ($orders->appoint_date != null)?$orders->appoint_date:'',
            'vehicle_type'        => ($orders->vehicle_type != null)?$orders->vehicle_type:'',
            'brand_name'          => ($orders->brand_id != null)?$orders->brand_id:'',
            'vehicle_model'       => ($orders->vehicle_model != null)?$orders->vehicle_model:'',
            'vehicle_color'       => ($orders->vehicle_color != null)?$orders->vehicle_color:'',
            'vehicle_no'          => ($orders->vehicle_no != null)?$orders->vehicle_no:'',
            'owner_name'          => ($orders->owner_name != null)?$orders->owner_name:'',
            'owner_phone'         => ($orders->owner_phone != null)?$orders->owner_phone:'',
            'order_status'        => ($orders->order_status != null)?$orders->order_status:'',
            'sub_total'           => ($orders->sub_total != null)?$orders->sub_total:'',
            'package_duration'    => ($orders->work_address != null)?$orders->work_address:'',
            'customer_address'    => ($orders->cust_address != null)?$orders->cust_address:'',
            'payment_mode'        => ($orders->payment_mode != null)?$orders->payment_mode:'',
        ]);
    }
}
