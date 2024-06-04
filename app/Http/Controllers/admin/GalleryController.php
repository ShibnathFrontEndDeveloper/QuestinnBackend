<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function list()
    {
        $list = Gallery::all();
        return view('admin.admin-views.gallery.list',compact('list'));
    }

    public function addView(){
        // $facilities = Facilities::all();
        // $categories = Category::all();
        return view('admin.admin-views.gallery.add');
    }

    public function add(Request $request){  
                  
        $banner = new Gallery();
        $banner->video_url = $request->video;
        $imageName = time().'_'.rand(999,9999).'.'.$request->image->extension();  
        $request->image->move(public_path('storage/gallery'), $imageName);
        $fullname = 'public/storage/gallery/'.$imageName;
        $banner->image = $fullname;
        $banner->save();

        toastr()->success('Gallery Add Successfully');
        return redirect()->back();
    }
 
    public function delete($id){
      $delete = Gallery::find($id);
      $delete->delete();
      toastr()->success('Gallery Deleted Successfully');
      return redirect()->back();

    }

    public function edit($id){
        
        $edit = Gallery::find($id);
        return view('admin.admin-views.gallery.edit',compact('edit'));  
        
    }

    public function update(Request $request,$id){
        
        $gallery = Gallery::find($id);
        if($request->has('image')){
        	$imageName = time().'_'.rand(999,9999).'.'.$request->image->extension();
        	$request->image->move(public_path('storage/gallery'), $imageName);
            $fullname = 'public/storage/gallery/'.$imageName;
        }else{
        	$fullname = $gallery->image;
        }
        $gallery->image = $fullname;       
        $gallery->video_url = $request->video;       
        $gallery->save();

        toastr()->success('Gallery Updated Successfully');
        return redirect()->back();
        
    } 
}
