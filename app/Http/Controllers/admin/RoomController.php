<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Facilities;
use App\Models\Category;
use App\Models\Room;
use App\Models\RoomNo;

class RoomController extends Controller
{
    public function list(){
        // $brand = Brand::all();
        $room = Room::all();
        return view('admin.admin-views.room.list',compact('room'));
    }

    public function addView(){
        $facilities = Facilities::all();
        $categories = Category::all();
        return view('admin.admin-views.room.add',compact('facilities','categories'));
    }

    public function add(Request $request){  

        // $validator = Validator::make($request->all(),[
        //     'brand_name'  => 'required',
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->errors());       
        // }                          
        $room = new Room();
        $room->title = $request->title;
        $room->slug = Str::slug($request->title);
        $room->price = $request->price;
        $room->description = $request->description;
        $imgData = array();
        if($request->hasfile('image')) {
            foreach($request->file('image') as $file)
            {
                $name = time().'_'.rand(999,9999).'.'.$file->getClientOriginalName();
                $file->move(public_path('storage/room'), $name);  
                $imgData[] = $name;  
            }                                  
        }                           
        $room->images = json_encode($imgData);
        $room->number_of_bed = $request->bedroom;
        $room->number_of_bathroom = $request->bathroom;
        $room->is_balcony = $request->is_balcony;       
        $room->facilities = json_encode($request->features);
        $room->categories = $request->category;
        $room->adults = $request->adults;
        $room->childrens = $request->chirdrens;
        $room->room_quantity = $request->room_no;         
        $room->save();

        toastr()->success('Room Add Successfully');
        return redirect()->back();
    }
 
    public function delete($id){
      $delete = Room::find($id);
      $delete->delete();
      toastr()->success('Room Deleted Successfully');
      return redirect()->back();

    }

    public function edit($id){
        $edit = Room::where('id',$id)->first();
        $categories = Category::all();
        $facilities = Facilities::all();
        return view('admin.admin-views.room.edit',compact('edit','categories','facilities'));
    }

    public function update(Request $request,$id){
        
        $room = Room::find($id);

        // $validator = Validator::make($request->all(),[
        //     'brand_name'  => 'required',
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->errors());       
        // }
        // $room->title = $request->title;
        // $room->price = $request->price;
        // $room->description = $request->description;
        $imgData = array();
        if($request->hasfile('image')) {
            foreach($request->file('image') as $file)
            {
                $name = time().'_'.rand(999,9999).'.'.$file->getClientOriginalName();
                $file->move(public_path('storage/room'), $name);  
                $imgData[] = $name;  
            } 
            $imageName  = json_encode($imgData);                        
        }else{
        	$imageName = $room->images;
        }
        

        $room->title = $request->title;
        $room->slug = Str::slug($request->title);
        $room->price = $request->price;
        $room->description = $request->description;                               
        $room->images = $imageName;
        $room->number_of_bed = $request->bedroom;
        $room->number_of_bathroom = $request->bathroom;
        $room->is_balcony = $request->is_balcony;       
        $room->facilities = json_encode($request->features);;
        $room->categories = $request->category;
        $room->adults = $request->adults;
        $room->childrens = $request->chirdrens;
        $room->room_quantity = $request->room_no;    
        $room->save();

        toastr()->success('Room Updated Successfully');
        return redirect()->back();
    }

    public function view($id){
        $data = RoomNo::where('room_id',$id)->get();
        return view('admin.admin-views.room.room_no',compact('id','data'));
    }

    public function add_room_no(Request $request,$id){
       
        $insert = new RoomNo();
        $insert->room_id = $id;
        $insert->room_no = $request->room_no;
        $insert->save();

        toastr()->success('Room Updated Successfully');
        return redirect()->back();

    }

    public function room_delete($id){
       $delete = RoomNo::where('id',$id)->delete();
       toastr()->success('Room Deleted Successfully');
        return redirect()->back();
    }
}
