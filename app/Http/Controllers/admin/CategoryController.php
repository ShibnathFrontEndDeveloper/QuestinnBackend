<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\FoodCategory;
use App\Models\Foods;
use Validator;

class CategoryController extends Controller
{
    public function list(){
        $category = Category::all();
        return view('admin.admin-views.category.list',compact('category'));
    }

    public function addView(){
        return view('admin.admin-views.category.add');
    }

    public function add(Request $request){  

        $validator = Validator::make($request->all(),[
            'name'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        toastr()->success('Category Add Successfully');
        return redirect()->back();
    }

    public function delete($id){
      $delete = Category::find($id);
      $delete->delete();
      toastr()->success('Facilities Deleted Successfully');
      return redirect()->back();

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

    public function select_foods(Request $request){
        
        $foods = Foods::where('foodcategory_id',$request->id)->where('status',1)->get();
            
        return response()->json([
            'status' => 'successfull',
            'data' => $foods,
        ]);

    }

    public function foodAmount(Request $request){
        $foods = Foods::where('id',$request->id)->where('status',1)->first();
        return response()->json([
            'status' => 'successfull',
            'data' => $foods->amount,
        ]);
    }
}
