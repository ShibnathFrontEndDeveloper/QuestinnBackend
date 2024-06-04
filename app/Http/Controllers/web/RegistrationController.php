<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class RegistrationController extends Controller
{
    public function register(Request $request){        
          
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'phone_number' => 'required|string',
            'password' => 'required',
            'confirm_password' => 'required_with:password|same:password',
            'address' => 'required',            
        ], [      
            'name.required' => 'Name is required',
            'register.required' => 'Email is required',  
            'register.unique' => 'This email has already been taken.',
            'phone_number.required' => 'Phone number is required',  
            'password.required' => 'Password is required',  
            'confirm_password.same' => 'Confirm password must be same as password',  
            'address.required' => 'Address is required',             
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
           
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->id_name = $request->id_name;
        $user->phone_no = $request->phone_number;
        if($request->image){
            $imageName = time().'_'.rand(999,9999).'.'.$request->image->extension();  
            $request->image->move(public_path('storage/profile'), $imageName);
        }else{
            $imageName = 'user.png';
        }
        
        $user->picture = $imageName;
        $user->address = $request->address;                             
        $user->password = Hash::make($request->password);
        $user->save();
        
        // toastr()->success('A confirnmation mail sent to your email address after verification');
        toastr()->success('Thank you, for register in Questinn');
        return redirect('/');
                      
    }

    public function register_view(){
        return view('register');
    }
}
