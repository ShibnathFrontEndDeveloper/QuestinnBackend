<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilities;
use App\Models\Coupon;
use Validator;

class CouponController extends Controller
{
    public function list(){
        $facilities = Facilities::all();
        return view('admin.admin-views.coupon.list',compact('facilities'));
    }

    public function addView(){
        return view('admin.admin-views.facilities.add');
    }

    public function add(Request $request){  

        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'icon'  => 'required',
            'desc'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        

        if($request->has('icon')){
        	$imageName = time().'_'.rand(999,9999).'.'.$request->icon->extension();
        	$request->icon->move(public_path('storage/facilities'), $imageName);            
        }

        $Facilities = new Facilities();
        $Facilities->name = $request->name;
        $Facilities->icon = $imageName;
        $Facilities->desc = $request->desc;
        $Facilities->save();

        toastr()->success('Facilities Add Successfully');
        return redirect()->back();
    }

    public function delete($id){
      $delete = Facilities::find($id);
      $delete->delete();
      toastr()->success('Facilities Deleted Successfully');
      return redirect()->back();

    }

    public function edit($id){
        $edit = Facilities::where('id',$id)->first();
        return view('admin.admin-views.facilities.edit',compact('edit'));
    }

    public function update(Request $request,$id){
        
        $facilities = Facilities::find($id);

        $validator = Validator::make($request->all(),[
            'name'  => 'required',            
            'desc'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        if($request->has('icon')){
        	$imageName = time().'_'.rand(999,9999).'.'.$request->icon->extension();
        	$request->icon->move(public_path('storage/facilities'), $imageName);            
        }else{
            $imageName = $facilities->icon;
        }

        $facilities->name = $request->name;
        $facilities->icon = $imageName;
        $facilities->desc = $request->desc;
        $facilities->save();

        if($facilities){
            toastr()->success('Facilities Updated Successfully');
        	return Redirect()->back();
        }else{
            toastr()->error('Something Went Wrong');
        	return back()->withInput();
        }

    }
}
