<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\ContactDetails;
use Validator;

class ContactUsController extends Controller
{
    public function list()
    {
        $list = ContactUs::all();
        return view('admin.admin-views.contactUs.contactList',compact('list'));
    }

    public function view()
    {
        $sql = ContactDetails::first();
        return view('admin.admin-views.contactUs.add',compact('sql'));
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'title'  => 'required',
            'address'  => 'required',
            'email'  => 'required',
            'phone'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
          
        $sql = ContactDetails::first();
        if($sql){
            $sql->title = $request->title;
            $sql->address = $request->address;
            $sql->email = $request->email;
            $sql->phone = $request->phone;
            $sql->save();
        }else {
            $sql = new ContactDetails();
            $sql->title = $request->title;
            $sql->address = $request->address;
            $sql->email = $request->email;
            $sql->phone = $request->phone;
            $sql->save();
        } 

        toastr()->success('Contact Details Updated Successfully');       
        return redirect()->back();
    }
}
