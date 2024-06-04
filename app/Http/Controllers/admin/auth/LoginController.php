<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\Admin;

class LoginController extends Controller
{

    public function loginView(){
        return view('admin.admin-views.auth.login');
    }
    
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'username'  => 'required|email|max:255',
            'password' => 'required|string|min:5'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        if (Auth::guard('admin')->attempt(['user_name' => $request->username, 'password' => $request->password])) {
            // Authentication was successful...
            return redirect()->route('admin.dashboard');
        }else {
            return redirect()->back()->withErrors('Invalid user');
        }
    
    }

    public function logOut(){
        auth()->guard('admin')->logout();
        // Toastr::info('Come back soon, ' . '!');
        return redirect()->route('admin.loginView');
    }
}
