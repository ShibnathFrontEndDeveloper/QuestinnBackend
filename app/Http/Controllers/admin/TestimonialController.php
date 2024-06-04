<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function list(){
        $list = Testimonial::all();
        return view('admin.admin-views.testimonial.list',compact('list'));
    }

    public function addView(){
        // $facilities = Facilities::all();
        // $categories = Category::all();
        return view('admin.admin-views.testimonial.add');
    }

    public function add(Request $request){  
        
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $imageName = time().'_'.rand(999,9999).'.'.$request->image->extension();
        $request->image->move(public_path('storage/testimonial'), $imageName);
        $testimonial->image = $fullname;
        $testimonial->rating = $request->rating;
        $testimonial->description = $request->description;
        $testimonial->save();

        toastr()->success('Testimonial Add Successfully');
        return redirect()->back();
    }
 
    public function delete($id){
      $delete = Testimonial::find($id);
      $delete->delete();
      toastr()->success('Testimonial Deleted Successfully');
      return redirect()->back();

    }

    public function edit($id){
        $edit = Testimonial::find($id);
        // $categories = Category::all();
        // $facilities = Facilities::all();
        return view('admin.admin-views.testimonial.edit',compact('edit'));  
    }

    public function update(Request $request,$id){
        
        $testimonial = Testimonial::find($id);
        if($request->has('image')){
        	$imageName = time().'_'.rand(999,9999).'.'.$request->image->extension();
        	$request->image->move(public_path('storage/testimonial'), $imageName);
           
        }else{
        	$imageName = $testimonial->image;
        }
        $testimonial->name = $request->name;
        $testimonial->image = $imageName;   
        $testimonial->rating = $request->rating;
        $testimonial->description = $request->description;
                
        $testimonial->save();

        toastr()->success('Testimonial Updated Successfully');
        return redirect()->back();
    }  
}
