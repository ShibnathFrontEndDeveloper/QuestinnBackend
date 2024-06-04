<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\Mailsend;
use App\Models\User;
use Validator;

class LoginController extends Controller
{
    use Mailsend;
    public function login_view(){
        return view('login');
    }

    public function login(Request $request){
                
        $validator = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required',                        
        ],[      
            'email.required' => 'email is required',
            'password.required' => 'password is required',            
        ]);

        // if($validator->fails())
        // {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {                    
            toastr()->success('You are successfully logged in!');
            return redirect('/');
        }
        else{                                   
            toastr()->error('Something Went Wrong');
            return redirect('/');
        }
    
    }

    public function logout(){
        auth()->logout();       
        return redirect('/');
    }

    public function send_forget_mail(Request $request){
       $user = User::where('email',$request->email)->first();
       if($user){
        $otp = rand(1000,9999);
        $user->otp = $otp;
        $user->save();        
        $request->session()->put('email', $request->email);
        $checkStatus = $this->sendMail($request->email,$otp);        
        if($checkStatus == 1){
            return response()->json([
                'status' => 1
            ]);
           }else {
            return response()->json([
                'status' => 0
            ]);
           }
       }else{
        return response()->json([
            'status' => 2
        ]); 
       }
              
    }

    public function check_otp(Request $request){
        if(session()->exists('email')){        
            $email = $request->session()->get('email');
            $user = User::where('email',$email)->first();            
            if($user->otp == $request->otp){
                return response()->json([
                    'status' => 1
                ]); 
            }
            return response()->json([
                'status' => 0
            ]);
        }else {
            return response()->json([
                'status' => 0
            ]); 
        }
    }

    public function reset_password(Request $request){
        if(session()->exists('email')){         
            $email = $request->session()->get('email');
            $user = User::where('email',$email)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'status' => 1
            ]); 
        }else {
            return response()->json([
                'status' => 0
            ]);
        }
    }
}
