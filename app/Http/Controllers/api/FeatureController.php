<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages;
use App\Models\Addition;
use App\Models\Banner;
use App\Models\Coupon;
use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\Order;
use App\Models\AddOptions;
use Validator;
use Illuminate\Support\Facades\DB;

class FeatureController extends Controller
{
    public function packages(){
        // $packages = Packages::select('id','image','title','duration','description','price')->get();
        $packages = DB::table('packages')->select('id','image','title','duration','description','price')->get();

        if($packages){
            return response()->json([
                'status'    => 200,
                'list'      => $packages,
                'created_at'=> now(),
                'updated_at' => now(),
            ]);
        }else {
            return response()->json(
                ['status' => 403,
                'error'=>'Unauthorized Coupons List'],
                403
            );
        }
        
    }

    public function additional_options(){
        $additional_options = Addition::select('id','is_select','package_title','package_description','package_price')->get();
        $response = [];
        foreach($additional_options as $keys => $values){
            $addOptions = DB::table('add_options')->where('user_id',auth('sanctum')->user()->id)->where('addOptions_id',$values->id)->first();
            if(isset($addOptions->is_select) && $addOptions->is_select == 'true'){
                $values->is_select = 'true';
            }
            array_push($response,$values);
        }

        
        if($additional_options){
            return response()->json([
                'status'    => 200,
                'list'      => $additional_options,
                'created_at'=> now(),
                'updated_at' => now(),
            ]);
        }else {
            return response()->json(
                ['status' => 403,
                'error'=>'Unauthorized Coupons List'],
                403
            );
        }
    }

    public function add_options(Request $request){

        $validator = Validator::make($request->all(),[
            'id'                  => 'required',
            'is_select'           => 'required',
            'package_title'       => 'required',
            'package_description' => 'required',
            'package_price'       => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        
        $addOptions = AddOptions::where('user_id',auth('sanctum')->user()->id)->where('addOptions_id',$request->id)->first();
        
        if(isset($addOptions)){
            $addUpdate = AddOptions::find($addOptions->id);
            $addUpdate->user_id             = auth('sanctum')->user()->id;
            $addUpdate->addOptions_id       = $request->id;
            $addUpdate->is_select           = $request->is_select;
            $addUpdate->package_title       = $request->package_title;
            $addUpdate->package_description = $request->package_description;
            $addUpdate->package_price       = $request->package_price;
            $addUpdate->save();
        }else {
            $addUpdate = new AddOptions();
            $addUpdate->user_id             = auth('sanctum')->user()->id;
            $addUpdate->addOptions_id       = $request->id;
            $addUpdate->is_select           = $request->is_select;
            $addUpdate->package_title       = $request->package_title;
            $addUpdate->package_description = $request->package_description;
            $addUpdate->package_price       = $request->package_price;
            $addUpdate->save();
        }

        // $list = array();
        // foreach($addOptions as $keys => $values){ 
        //     $data['id'] = ($values->id != null)?$values->id:'';
        //     $data['is_select'] = $values->is_select;
        //     $data['package_title'] = ($values->package_title != null)?$values->package_title:'';
        //     $data['package_description']= ($values->package_description != null)?$values->package_description:'';
        //     $data['package_price'] = ($values->package_price != null)?$values->package_price:'';
        //     array_push($list,$data);
        // }

        return response()->json([
            'status'             => 200,
            'id'                 => ($addUpdate->addOptions_id != null)?$addUpdate->addOptions_id:'',
            'is_select'          => ($addUpdate->is_select != null)?$addUpdate->is_select:'',
            'package_title'      => ($addUpdate->package_title != null)?$addUpdate->package_title:'',
            'package_description'=> ($addUpdate->package_description != null)?$addUpdate->package_description:'',
            'package_price'      => ($addUpdate->package_price != null)?$addUpdate->package_price:'',
            'created_at'         => $addUpdate->created_at,
            'updated_at'         => $addUpdate->updated_at,
        ]);

    }

    public function banner(){
        $banner = Banner::select('id','title_one','title_two','images')->get();

        if($banner){
            return response()->json([
                    'status'       => 200,
                    'list'         => $banner,
                    'created_at'   => now(),
                    'updated_at'    => now(),
                ]);
        }else {
            return response()->json(
                ['status' => 403,
                'error'=>'No data to show'],
                403
            );
        }
    }

    public function Coupon(){
        $coupon = Coupon::select('id','code','value')->get();

        if($coupon){
            return response()->json([
                'status'       => 200,
                'list'         => $coupon,
                'created_at'   => now(),
                'updated_at'    => now(),
            ]);
        }else {
            return response()->json(
                ['status' => 403,
                'error'=>'No data to show'],
                403
            );
        }
    }

    public function vehicle_type_list(){
        // $vehicle_type = Vehicle::select('id','vehicle_type','v_type_img')->get();
        $vehicle_type = DB::table('vehicle_type')->select('id','vehicle_type','v_type_img')->get();
        $brand = Brand::select('id','brand_name')->get();

        foreach($vehicle_type as $key => $value){
            if($brand){
                $vehicle_type[$key]->brand_name = $brand;
            }else {
                $vehicle_type[$key]->brand_name = '';
            }
        }
         
        if($vehicle_type){
            return response()->json([
                'status'       => 200,
                'list'         => $vehicle_type,
                'created_at'   => now(),
                'updated_at'    => now(),
            ]);
        }else {
            return response()->json(
                ['status' => 403,
                'error'=>'No data to show'],
                403
            );
        }

    }

    public function booking_history(){
        // $order = Order::where('')
       $userId = auth('sanctum')->user()->id;
       if($userId){
            $order = Order::select('id','user_id','trans_id','addition_id','appoint_date','vehicle_type','brand_id',
            'vehicle_model','vehicle_color','vehicle_no','owner_name','owner_phone','order_status','sub_total','package_id'
            ,'cust_address')->where('user_id',$userId)->get();
            $Addition = [];
            foreach($order as $keys => $values){
                $additionId = json_decode($values->addition_id,true);
                foreach($additionId as $aKeys => $aValues){
                    $sqlAddition = DB::table('additional_facilities')->where('id',$aValues)->first();
                    if(isset($sqlAddition)){
                        $Addition['id'] = $sqlAddition->id;
                        $Addition['package_title'] = $sqlAddition->package_title;
                        $Addition['package_description'] = $sqlAddition->package_description;
                        $Addition['package_price'] = $sqlAddition->package_price;
                    }
                }
                // print_r($order[$keys]->brand_id);
                $brand = Brand::where('id',$values->brand_id)->first();
                $package = Packages::where('id',$values->package_id)->first();
                $order[$keys]->package_title = (isset($package)?$package->title:'');
                $order[$keys]->package_duration = (isset($package)?$package->duration:'');
                $order[$keys]->brand_name = (isset($brand)?$brand->brand_name:'');
                $order[$keys]->add_options_list = $Addition;
                unset($order[$keys]->addition_id);
                unset($order[$keys]->brand_id);
                unset($order[$keys]->package_id);
            }  
            
            if($order){
                return response()->json([
                    'status'       => 200,
                    'list'         => $order,
                ]);
            }else {
                return response()->json(
                    ['status' => 403,
                    'error'=>'No data to show'],
                    403
                );
            }
       }else {
            return response()->json(
                ['status' => 403,
                'error'=>'Unauthorised User'],
                403
            );
       }
        
    }

    

}
