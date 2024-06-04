<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\management;
use Validator;

class AboutController extends Controller
{
    public function view(){
        $edit = About::first();
        return view('admin.admin-views.about.about',compact('edit'));
    }

    public function update(Request $request){
        
        $sql = About::first();
        if(!$sql){
            $validator = Validator::make($request->all(),[
                'img'  => 'required',
            ]);
    
            if($validator->fails()){
                return response()->json($validator->errors());       
            }
        }
        
        if($request->has('img')){
        	$imageName = time().'_'.rand(999,9999).'.'.$request->img->extension();
        	$request->img->move(public_path('storage/about'), $imageName);
            // $fullname = 'public/storage/banner/'.$imageName;
        }else{
        	$imageName = $sql->image;
        }

        if($request->has('rooms_icon')){
        	$imageRoom = time().'_'.rand(999,9999).'.'.$request->rooms_icon->extension();
        	$request->rooms_icon->move(public_path('storage/about'), $imageRoom);
            // $fullname = 'public/storage/banner/'.$imageName;
        }else{
        	$imageRoom = $sql->rooms_icon;
        }

        if($request->has('customers_icon')){
        	$imageCustomer = time().'_'.rand(999,9999).'.'.$request->customers_icon->extension();
        	$request->customers_icon->move(public_path('storage/about'), $imageCustomer);
            // $fullname = 'public/storage/banner/'.$imageName;
        }else{
        	$imageCustomer = $sql->customers_icon;
        }

        if($request->has('reviews_icon')){
        	$imageReviews = time().'_'.rand(999,9999).'.'.$request->reviews_icon->extension();
        	$request->reviews_icon->move(public_path('storage/about'), $imageReviews);
            // $fullname = 'public/storage/banner/'.$imageName;
        }else{
        	$imageReviews = $sql->reviews_icon;
        }

        if($request->has('staffs_icon')){
        	$imagestaff = time().'_'.rand(999,9999).'.'.$request->staffs_icon->extension();
        	$request->staffs_icon->move(public_path('storage/about'), $imagestaff);
            // $fullname = 'public/storage/banner/'.$imageName;
        }else{
        	$imagestaff = $sql->staffs_icon;
        }

        $flight = About::updateOrCreate(
            ['id' => 1],
            [
                'heading' => $request->heading,
                'title'=>$request->title,
                'image'=>$imageName,
                'description'=>$request->description,
                'room_no'=>$request->rooms_no,
                'customer_no'=>$request->customers_no,
                'review_no'=>$request->reviews_no,
                'staff_no'=>$request->staffs_no,
                'rooms_icon'=>$imageRoom,
                'customers_icon'=>$imageCustomer,
                'reviews_icon'=>$imageReviews,
                'staffs_icon'=>$imagestaff,
            ]
        );

        toastr()->success('About Updated Successfully');
        return redirect()->back();
        
    }

    public function list()
    {
        $list = management::all();
        return view('admin.admin-views.about.management_team.list',compact('list'));
    }

    public function addView(){       
        return view('admin.admin-views.about.management_team.add',);
    }

    public function add(Request $request){ 
        
        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'img'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
                  
        $management = new management();
        $management->name = $request->name;        
        $imageName = time().'_'.rand(999,9999).'.'.$request->img->extension();  
        $request->img->move(public_path('storage/about'), $imageName);        
        $management->image = $imageName;                   
        $management->save();

        toastr()->success('Management Add Successfully');
        return redirect()->back();
    }
 
    public function delete($id){
      $delete = management::find($id);
      $delete->delete();
      toastr()->success('Management Deleted Successfully');
      return redirect()->back();

    }

    public function edit($id){
        $edit = management::find($id);        
        return view('admin.admin-views.about.management_team.edit',compact('edit'));  
    }

    public function manage_update(Request $request,$id){
        
        $management = management::find($id);        
        if($request->has('img')){
        	$imageName = time().'_'.rand(999,9999).'.'.$request->img->extension();
        	$request->img->move(public_path('storage/about'), $imageName);           
        }else{
        	$imageName = $management->image;
        }        
        $management->name = $request->name;                     
        $management->image = $imageName;                   
        $management->save();

        toastr()->success('Management Updated Successfully');
        return redirect()->back();
    } 


}
