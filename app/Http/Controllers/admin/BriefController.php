<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brief;
use Validator;

class BriefController extends Controller
{
    public function list()
    {
        $briefs = Brief::all();
        return view('admin.admin-views.brief.list',compact('briefs'));
    }

    public function addView(){
        // $facilities = Facilities::all();
        // $categories = FoodCategory::all();
        return view('admin.admin-views.brief.add');
    }

    public function add(Request $request){ 

        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'title'  => 'required',
            'image'  => 'required',
            'ratings'  => 'required',
            'desc'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
                          
        $briefs = new Brief();
        $briefs->name = $request->name;   
        foreach($request->file('image') as $key => $file)
            {
                $imageName = time().'_'.rand(999,9999).'.'.$file->extension();  
                $file->move(public_path('uploads'), $imageName);
                $files[] = $imageName;
            }              
        $briefs->images = json_encode($files,true);
        $briefs->rating = $request->ratings;       
        $briefs->title = $request->title;
        $briefs->description = $request->desc;                
        $briefs->save();

        toastr()->success('Brief Add Successfully');
        return redirect()->back();
    }
 
    // public function delete($id){
    //   $delete = Foods::find($id);
    //   $delete->delete();
    //   toastr()->success('Foods Deleted Successfully');
    //   return redirect()->back();

    // }

    public function edit($id){
        $edit = Brief::find($id);           
        return view('admin.admin-views.brief.edit',compact('edit'));  
    }

    public function update(Request $request,$id){
        // dd('FUGSDUY');
        
        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'title'  => 'required',            
            'ratings'  => 'required',
            'desc'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        
       

        $briefs = Brief::find($id);                
        $briefs->name = $request->name;  
        if($request->has('image')){
            foreach($request->file('image') as $key => $file)
            {
                $imageName = time().'_'.rand(999,9999).'.'.$file->extension();  
                $file->move(public_path('uploads'), $imageName);
                $all_files[] = $imageName;
            } 
            $files = json_encode($all_files,true);
        } else {
            $files = $briefs->images;
        }

        $briefs->images = $files;
        $briefs->rating = $request->ratings;       
        $briefs->title = $request->title;
        $briefs->description = $request->desc;                
        $briefs->save(); 
        
        toastr()->success('Brief Updated Successfully');
        return redirect()->back();
    } 
    
}
