<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function list()
    {
        $list = Banner::all();
        return view('admin.admin-views.banner.list',compact('list'));
    }

    public function addView(){
        // $facilities = Facilities::all();
        // $categories = Category::all();
        return view('admin.admin-views.banner.add');
    }

    public function add(Request $request){  
                  
        $banner = new Banner();
        $banner->heading = $request->name;
        $banner->section_name = $request->banner_section;
        $imageName = time().'_'.rand(999,9999).'.'.$request->banner->extension();  
        $request->banner->move(public_path('storage/banner'), $imageName);
        $fullname = 'public/storage/banner/'.$imageName;
        $banner->banner = $fullname;
       
        $banner->description = $request->description;
                
        $banner->save();

        toastr()->success('Banner Add Successfully');
        return redirect()->back();
    }
 
    public function delete($id){
      $delete = Banner::find($id);
      $delete->delete();
      toastr()->success('Banner Deleted Successfully');
      return redirect()->back();

    }

    public function edit($id){
        $edit = Banner::find($id);
        // $categories = Category::all();
        // $facilities = Facilities::all();
        return view('admin.admin-views.banner.edit',compact('edit'));  
    }

    public function update(Request $request,$id){
        
        $banner = Banner::find($id);
        $banner->heading = $request->name;
        $banner->section_name = $request->banner_section;
        if($request->has('banner')){
        	$imageName = time().'_'.rand(999,9999).'.'.$request->banner->extension();
        	$request->banner->move(public_path('storage/banner'), $imageName);
            $fullname = 'public/storage/banner/'.$imageName;
        }else{
        	$fullname = $banner->banner;
        }
        // $imageName = time().'_'.rand(999,9999).'.'.$request->banner->extension();  
        // $request->banner->move(public_path('storage/banner'), $imageName);
        $banner->banner = $fullname;       
        $banner->description = $request->description;                
        $banner->save();

        toastr()->success('Banner Updated Successfully');
        return redirect()->back();
    } 
}
