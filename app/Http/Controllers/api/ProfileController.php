<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use App\Models\User;
use Validator;

class ProfileController extends Controller
{
    public function index(Request $request){
        $validator = Validator::make($request->all(),[
            'name'         => 'sometimes',
            'email'         => 'sometimes',
            'password'      => 'sometimes',
            'profile_img'   => 'sometimes',
            'home_address' => 'sometimes',
            'home_address2' => 'sometimes',
            'home_street' => 'sometimes',
            'home_area' => 'sometimes',
            'home_city'  => 'sometimes',
            'home_district' => 'sometimes',
            'home_state' => 'sometimes',
            'home_pinCode' => 'sometimes',
            'home_marker'  => 'sometimes',
            'home_lat' => 'sometimes',
            'home_long' => 'sometimes',
            'work_marker' => 'sometimes',
            'work_lat' => 'sometimes',
            'work_long' => 'sometimes',
            'work_address'  => 'sometimes',
            'work_address2'  => 'sometimes',
            'work_street' => 'sometimes',
            'work_area ' => 'sometimes',
            'work_city ' => 'sometimes',
            'work_district'  => 'sometimes',
            'work_state' => 'sometimes',
            'work_pinCode' => 'sometimes',
        ]);

       


        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        if(auth('sanctum')->user()->id == null){
            return response()->json([
                'message' => 'Your Session Has Expired'
            ], 401);
        }
        if($request->profile_img != ''){
            $imageName = time().'.'.$request->profile_img->extension();  
            $request->profile_img->move(public_path('storage/images'), $imageName);
        }else {
            $image = Profile::where('user_id',auth('sanctum')->user()->id)->first();
            $imageName = isset($image)?$image->profile_img : null;
        }
        
        $profile = Profile::updateOrCreate(
            ['user_id' => auth('sanctum')->user()->id],
            ['profile_img'=> $imageName,
            'home_address'=> $request->home_address,
            'home_address2'=> $request->home_address2,
            'home_street'=> $request->home_street,
            'home_area'=> $request->home_area,
            'home_city'=> $request->home_city,
            'home_district'=> $request->home_district,
            'home_state'=> $request->home_state,
            'home_pinCode'=> $request->home_pinCode,
            'home_marker'=> $request->home_marker,
            'home_lat'=> $request->home_lat,
            'home_long'=> $request->home_long,
            'work_marker'=> $request->work_marker,
            'work_lat'=> $request->work_lat,
            'work_long'=> $request->work_long,
            'work_address'=> $request->work_address,
            'work_address2'=> $request->work_address2,
            'work_street'=> $request->work_street,
            'work_area'=> $request->work_area,
            'work_city'=> $request->work_city,
            'work_district'=> $request->work_district,
            'work_state'=> $request->work_state,
            'work_pincode'=> $request->work_pinCode,
        ]);
        $user = User::find(auth('sanctum')->user()->id);
        if(isset($request->password)){
            $password = Hash::make($request->password);
        }else{
           $password = $user->password;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $password;
        $user->save();
        // $profile = new Profile();
        // $profile->user_id = auth('sanctum')->user()->id;
        // $profile->profile_img = $imageName;
        // $profile->home_address = $request->home_address;
        // $profile->home_street = $request->home_street;
        // $profile->home_area = $request->home_area;
        // $profile->home_city = $request->home_city;
        // $profile->home_district = $request->home_district;
        // $profile->home_state = $request->home_state;
        // $profile->home_pinCode = $request->home_pinCode;
        // $profile->home_marker = $request->home_marker;
        // $profile->home_lat = $request->home_lat;
        // $profile->home_long = $request->home_long;
        // $profile->work_marker = $request->work_marker;
        // $profile->work_lat = $request->work_lat;
        // $profile->work_long = $request->work_long;
        // $profile->work_address = $request->work_address;
        // $profile->work_street  = $request->work_street;
        // $profile->work_area = $request->work_area;
        // $profile->work_city = $request->work_city;
        // $profile->work_district = $request->work_district;
        // $profile->work_state = $request->work_state;
        // $profile->work_pinCode = $request->work_pinCode;
        // $profile->save();

        return response()->json([
            'status' => 200,
            'name'  => ($user->name != null)?$user->name:'',
            'email'  => ($user->email != null)?$user->email:'',
            'password'  => ($user->password != null)?$user->password:'',
            'profile_img'  => ($profile->profile_img != null)?$profile->profile_img:'',
            'home_address' => ($profile->home_address != null)?$profile->home_address:'',
            'home_address2' => ($profile->home_address2 != null)?$profile->home_address2:'',
            'home_street'  => ($profile->home_street != null)?$profile->home_street:'',
            'home_area'    => ($profile->home_area != null)?$profile->home_area:'',
            'home_city'    => ($profile->home_city != null)?$profile->home_city:'',
            'home_district'=> ($profile->home_district != null)?$profile->home_district:'',
            'home_state'   => ($profile->home_state != null)?$profile->home_state:'',
            'home_pinCode' => ($profile->home_pinCode != null)?$profile->home_pinCode:'',
            'home_marker'  => ($profile->home_marker != null)?$profile->home_marker:'',
            'home_lat'     => ($profile->home_lat != null)?$profile->home_lat:'',
            'home_long'    => ($profile->home_long != null)?$profile->home_long:'',
            'work_marker'  => ($profile->work_marker != null)?$profile->work_marker:'',
            'work_lat'     => ($profile->work_lat != null)?$profile->work_lat:'',
            'work_long'    => ($profile->work_long != null)?$profile->work_long:'',
            'work_address' => ($profile->work_address != null)?$profile->work_address:'',
            'work_address2' => ($profile->work_address2 != null)?$profile->work_address2:'',
            'work_street'  => ($profile->work_street != null)?$profile->work_street:'',
            'work_area'    => ($profile->work_area != null)?$profile->work_area:'',
            'work_city'    => ($profile->work_city != null)?$profile->work_city:'',
            'work_district'=> ($profile->work_district != null)?$profile->work_district:'',
            'work_state'   => ($profile->work_state != null)?$profile->work_state:'',
            'work_pinCode' => ($profile->work_pincode != null)?$profile->work_pincode:'',
        ]);
    }

    public function profile_data(){

        if(auth('sanctum')->user()->id == null){
            return response()->json([
                'message' => 'Unauthorised User'
            ], 401);
        }

        $profile = Profile::where('user_id',auth('sanctum')->user()->id)->first();
        $user = User::where('id',auth('sanctum')->user()->id)->first();

        return response()->json([
            'status'       => 200,
            'name'         => ($user->name != null)?$user->name:'',
            'email'        => ($user->email != null)?$user->email:'',
            'password'     => ($user->password != null)?$user->password:'',
            'profile_img'  => (isset($profile->profile_img))?$profile->profile_img:'',
            'home_address' => (isset($profile->home_address))?$profile->home_address:'',
            'home_address2' => (isset($profile->home_address2))?$profile->home_address2:'',
            'home_street'  => (isset($profile->home_street))?$profile->home_street:'',
            'home_area'    => (isset($profile->home_area))?$profile->home_area:'',
            'home_city'    => (isset($profile->home_city))?$profile->home_city:'',
            'home_district'=> (isset($profile->home_district))?$profile->home_district:'',
            'home_state'   => (isset($profile->home_state))?$profile->home_state:'',
            'home_pinCode' => (isset($profile->home_pinCode))?$profile->home_pinCode:'',
            'home_marker'  => (isset($profile->home_marker))?$profile->home_marker:'',
            'home_lat'     => (isset($profile->home_lat))?$profile->home_lat:'',
            'home_long'    => (isset($profile->home_long))?$profile->home_long:'',
            'work_marker'  => (isset($profile->work_marker))?$profile->work_marker:'',
            'work_lat'     => (isset($profile->work_lat))?$profile->work_lat:'',
            'work_long'    => (isset($profile->work_long))?$profile->work_long:'',
            'work_address' => (isset($profile->work_address))?$profile->work_address:'',
            'work_address2' => (isset($profile->work_address2))?$profile->work_address2:'',
            'work_street'  => (isset($profile->work_street))?$profile->work_street:'',
            'work_area'    => (isset($profile->work_area))?$profile->work_area:'',
            'work_city'    => (isset($profile->work_city))?$profile->work_city:'',
            'work_district'=> (isset($profile->work_district))?$profile->work_district:'',
            'work_state'   => (isset($profile->work_state))?$profile->work_state:'',
            'work_pinCode' => (isset($profile->work_pincode))?$profile->work_pincode:'',
        ]);
        
    }
}
