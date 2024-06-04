<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foods;
use App\Models\Facilities;
use App\Models\FoodCategory;
use App\Models\FoodOrder;
use App\Models\FoodOrder_details;
use Validator;

class FoodController extends Controller
{
    public function list()
    {
        $foods = Foods::With('category')->get();
        return view('admin.admin-views.foods.list',compact('foods'));
    }

    public function addView(){
        // $facilities = Facilities::all();
        $categories = FoodCategory::all();
        return view('admin.admin-views.foods.add',compact('categories'));
    }

    public function add(Request $request){ 
                
        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'image'  => 'required',
            'amount'  => 'required',
            'foodCat_id'  => 'required',
            'description' => 'required',
        ]); 

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        
                  
        $foods = new Foods();
        $foods->name = $request->name;        
        $imageName = time().'_'.rand(999,9999).'.'.$request->image->extension();  
        $request->image->move(public_path('storage/foods'), $imageName);    
        $foods->image = $imageName;
        $foods->amount = $request->amount;       
        $foods->foodcategory_id = $request->foodCat_id;
        $foods->description = $request->description;
        $foods->status = 1;
                
        $foods->save();

        toastr()->success('Foods Add Successfully');
        return redirect()->back();
    }
 
    public function delete($id){
      $delete = Foods::find($id);
      $delete->delete();
      toastr()->success('Foods Deleted Successfully');
      return redirect()->back();

    }

    public function edit($id){
        $edit = Foods::find($id);
        $categories = FoodCategory::all();        
        return view('admin.admin-views.foods.edit',compact('edit','categories'));  
    }

    public function update(Request $request,$id){
        
        $validator = Validator::make($request->all(),[
            'name'  => 'required',           
            'amount'  => 'required',
            'foodCat_id'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $foods = Foods::find($id);        
        if($request->has('image')){
        	$imageName = time().'_'.rand(999,9999).'.'.$request->image->extension();
        	$request->image->move(public_path('storage/foods'), $imageName);            
        }else{
        	$imageName = $foods->image;
        }
                       
        $foods->name = $request->name;                  
        $foods->image = $imageName;
        $foods->amount = $request->amount;       
        $foods->foodcategory_id = $request->foodCat_id;     
        $foods->description = $request->description;
        $foods->save();    
        toastr()->success('Foods Updated Successfully');
        return redirect()->back();
    } 

    public function food_orders(Request $request){
        $orders = FoodOrder::with('users','rooms_id')->orderBy('id','desc')->get();
        return view('admin.admin-views.foods.food_order',compact('orders'));
    }

    public function status($id,$is_active){
        $foods = Foods::find($id);
        $foods->status = $is_active;
        $foods->save();
        toastr()->success('Status Updated Successfully');
        return redirect()->back();
    }

    public function food_order_status($value , $id){       

        $status = FoodOrder::where('id',$id)->update([
            'paid_status' => $value,           
            'updated_at'   => now(),
        ]);

        if($status == 1){
            toastr()->success('status chhanged successfully');
            return redirect()->back();
        }else {
            toastr()->error('something went wrong');
            return redirect()->back();
        }
    }

    public function order_view(Request $request,$id){
        $details = FoodOrder_details::where('order_id',$id)->get();
        return view('admin.admin-views.foods.order_details',compact('details'));
    }
    
}
