<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurants;
use App\Models\Foods;
use App\Models\FoodCategory;
use App\Models\RestaurantDetails;
use Illuminate\Support\Facades\DB;
use Validator;

class RestaurantController extends Controller
{
    public function list(){
        $restaurants = Restaurants::with('restaurant_details')->get();
        // return view('admin.admin-views.restaurants.list',compact('category'));
        return view('admin.admin-views.restaurants.list',compact('restaurants'));
    }

    public function addView(){
        $categories = FoodCategory::where('status',1)->get();
        return view('admin.admin-views.restaurants.add',compact('categories'));
    }

    public function add(Request $request){  
        
        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'email'  => 'required',
            'phone'  => 'required',
            'address'  => 'required',
            'items'  => 'required',
            'qty'  => 'required',
            'amount'  => 'required',           
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $amount = [];
        foreach($request->items as $keys => $values){            
            $amount[] = $request->qty[$keys] * $request->amount[$keys];
            
        }        
        $order_id = DB::table('restaurant')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'tax' => 0,
            'discount' => 0,
            'total_amount' => array_sum($amount),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $or_d = [];
        foreach ($request->items as $key => $items) {                       
            $or_d[] = [
                'restaurant_id' => $order_id,
                'item' => $items,
                'quantiry' => $request->qty[$key],                
                'amount' => $request->amount[$key],                                
                'created_at' => now(),
                'updated_at' => now()
            ];
                                               
        }               
        DB::table('restaurant_details')->insert($or_d);

        toastr()->success('ordered Successfully');
        return redirect()->back();
    }

    public function delete($id){
      $delete = Category::find($id);
      $delete->delete();
      toastr()->success('Facilities Deleted Successfully');
      return redirect()->back();

    }

    public function view($id){
       $details = RestaurantDetails::where('restaurant_id',$id)->get();
       return view('admin.admin-views.restaurants.details',compact('details'));
    }

    public function edit($id){
        $edit = Category::where('id',$id)->first();
        return view('admin.admin-views.category.edit',compact('edit'));
    }

    public function update(Request $request,$id){
        
        $facilities = Category::find($id);

        $validator = Validator::make($request->all(),[
            'name'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $facilities->name = $request->name;
        $facilities->save();

        if($facilities){
            toastr()->success('Facilities Updated Successfully');
        	return Redirect()->back();
        }else{
            toastr()->error('Something Went Wrong');
        	return back()->withInput();
        }

    }

    public function food_list(){
        $category = FoodCategory::all();
        return view('admin.admin-views.food_category.list',compact('category'));
    }

    public function food_addView(){
        return view('admin.admin-views.food_category.add');
    }

    public function food_add(Request $request){  

        $validator = Validator::make($request->all(),[
            'name'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $category = new FoodCategory();
        $category->name = $request->name;
        $category->save();

        toastr()->success('Food Category Add Successfully');
        return redirect()->back();
    }

    public function food_delete($id){
      $delete = FoodCategory::find($id);
      $delete->delete();
      toastr()->success('Food Category Deleted Successfully');
      return redirect()->back();

    }

    public function food_edit($id){
        $edit = FoodCategory::where('id',$id)->first();
        return view('admin.admin-views.food_category.edit',compact('edit'));
    }

    public function food_update(Request $request,$id){
        
        $facilities = FoodCategory::find($id);

        $validator = Validator::make($request->all(),[
            'name'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $facilities->name = $request->name;
        $facilities->save();

        if($facilities){
            toastr()->success('Food category Updated Successfully');
        	return Redirect()->back();
        }else{
            toastr()->error('Something Went Wrong');
        	return back()->withInput();
        }

    }
}
