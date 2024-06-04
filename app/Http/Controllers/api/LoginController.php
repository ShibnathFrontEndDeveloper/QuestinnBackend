<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_no' => 'required|string',
            'password' => 'required|string|min:5'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'password' => Hash::make($request->password)
         ]);

         $token = $user->createToken('auth_token')->plainTextToken;
         return response()
            ->json([
                'status' => 200,
                'name' => $user->name,
                'email' => $user->email,
                'phone_no' => $user->phone_no,
                'message' => 'Registration Successful',
                'access_token' => $token,
                'token_type' => 'Bearer', 
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status'       => 200,
            'id'           => $user->id,
            'name'         => $user->name,
            'phone'        => $user->phone_no,
            'email'        => $user->email,
            'message'      => 'Login Successful',
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ]);
    }
}
