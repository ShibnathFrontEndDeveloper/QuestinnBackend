<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function list(){
        $list = User::orderBy('created_at','desc')->get();
        return view('admin.admin-views.user.list',compact('list'));
    }

    public function status($value,$user_id){
    
        User::where('id',$user_id)->update([
            'check_in_status' => $value,
            'updated_at'      => now(),
        ]);

        toastr()->success('status chhanged successfully');
        return redirect()->back();
    }
}
