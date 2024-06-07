<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;
use App\Models\Room;
use App\Models\About;
use App\Models\management;
use App\Models\ContactUs;
use App\Models\ContactDetails;
use App\Models\Facilities;
use App\Models\Foods;
use App\Models\FoodCategory;
use App\Models\User;
use App\Models\Order;
use App\Models\Brief;
use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Validator;
use DateTime;
use Session;
use App\Models\RoomNo;

class HomeController extends Controller
{
    public function index(){
        $banner = Banner::where('section_name','home')->get();
        $rooms = Room::take(3)->get();
        $brief = Brief::first();
        $facilities = Facilities::orderBy('id','asc')->take(5)->get();
        $testimonial = Testimonial::all();
        return view('index',compact('banner','rooms','brief','facilities','testimonial'));
    }

    public function about(){
        $banner = Banner::where('section_name','about')->get();
        $about = About::first();
        $management = management::all();
        // $rooms = Room::take(3)->get();
        return view('about',compact('about','management','banner'));
    }

    public function contact_us(){
        $banner = Banner::where('section_name','contact')->get();
        $details = ContactDetails::first();
        return view('contact',compact('banner','details'));
    }

    public function save_contact(Request $request){

        $contact = new ContactUs();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        toastr()->success('Data Submited successfully');
        return redirect()->back();
    }

    public function facilities(){
        $banner = Banner::where('section_name','facilities')->get();
        $facilities = Facilities::all();
        return view('facilities',compact('banner','facilities'));
    }

    public function food(){
        $banner = Banner::where('section_name','foods')->get();
        // $food = FoodCategory::With('foods')->where('status',1)->get();

        $food = FoodCategory::with(['foods' => function ($query) {
            $query->where('status', 1);
        }])->where('status', 1)->get();
        return view('food',compact('banner','food'));
    }

    public function category_foods($cat_id){
        $banner = Banner::where('section_name','foods')->get();
        // $food = FoodCategory::With('foods')->where('id',$cat_id)->where('status',1)->get();
        $food = FoodCategory::with(['foods' => function ($query) {
            $query->where('status', 1);
        }])
        ->where('id', $cat_id)
        ->where('status', 1)
        ->get();
        // foreach($food[0]->foods as $keys => $values){
        //     dump($values);
        // }
        // die;
        return view('breakfast',compact('banner','food'));
    }

    public function room(){
        $banner = Banner::where('section_name','room')->get();
        $facilities = Facilities::all();
        $rooms = Room::orderBy('id','desc')->get();

        return view('rooms',compact('rooms','facilities','banner'));
    }

    public function room_details($id){
        $banner = Banner::where('section_name','room_details')->get();
        $room = Room::where('id',$id)->first();
        return view('room_details',compact('banner','room'));
    }

    public function room_booking($slug){
        $banner = Banner::where('section_name','room_booking')->get();
        // $room = Room::where('slug',$slug)->first();
        $room = Room::withCount(['room_no as available_rooms' => function ($query) {
            $query->where('status', 'available');
        }])->where('slug', $slug)->first();
        return view('room_booking',compact('banner','room'));
    }

    public function room_booked(Request $request){

        $validator = Validator::make($request->all(),[
            'name'  => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'id_name' => 'required',
            'mobile' => 'required|string',
            'check_in' => 'required|string',
            'check_out' => 'required|string',
            'no_rooms' => 'required',
            'room_id' => 'required',
            'address' => 'required',
            'image' => 'required',
        ],[
            'name.required' => 'email is required',
            'email.required' => 'email is required',
            'mobile.required' => 'phone number is required',
            'id_name.required' => 'Id name is required',
            'address.required' => 'address is required',
            'check_in.required' => 'check in date is required',
            'check_out.required' => 'check out date is required',
            'no_rooms.required' => 'no of rooms is required',
            'room_id.required' => 'room_id is required',
            'image.required' => 'image is required',
        ]);

        if(!Auth::User()){
            return redirect()->route('loginview');
        }

        $user = User::where('email',$request->email)->first();

        if(!$user){
            $imageName = time().'_'.rand(999,9999).'.'.$request->image->extension();
            $request->image->move(public_path('storage/profile'), $imageName);
            Session::put('guest_user_image', $imageName);
        }


        return view('questInn_payment_ditails',compact('request'));

        // dd($validator);

        // $user = User::where('email',$request->email)->first();
        // $rooms = Room::where('id',$request->room_id)->first();
        // $rooms->no_room_booked = $request->no_rooms;
        // $rooms->available_rooms = $rooms->room_quantity - $request->no_rooms;
        // $rooms->save();
        // if(!$user){
        //     $imageName = time().'_'.rand(999,9999).'.'.$request->image->extension();
        //     $request->image->move(public_path('storage/profile'), $imageName);
        //     $user = new User();
        //     $user->name     = $request->name;
        //     $user->email    = $request->email;
        //     $user->phone_no = $request->mobile;
        //     $user->id_name  = $request->id_name;
        //     $user->picture  = $imageName;
        //     $user->address  = $request->address;
        //     $user->password = Hash::make(12345);
        //     $user->room_id = $request->room_id;
        //     $user->save();
        // }else {
        //     $user->room_id = $request->room_id;
        //     $user->save();
        // }

        // $order = new Order();
        // $order->user_id    = $user->id;
        // $order->from_date     = $request->check_in;
        // $order->to_date     = $request->check_out;
        // $order->room_id     = $request->room_id;
        // $order->quantity     = $request->no_rooms;
        // $order->groos_amount     = $rooms->price;
        // $order->discount     = '';
        // $order->nett_amount     = $rooms->price;
        // $order->adults     = $request->adults;
        // $order->childrens     = $request->childrens;
        // $order->payment_method     = 'cash';
        // $order->paid_status = 'unpaid';
        // $order->status     = 'pending';
        // $order->save();

        // toastr()->success('A confirnmation mail sent to your email address after verification');
        // return redirect('/');
    }

    public function room_booked_checkout(Request $request){

        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'mobile' => 'required|string',
            'check_in' => 'required|string',
            'check_out' => 'required|string',
            'no_rooms' => 'required',
            'room_id' => 'required',
            'address' => 'required',
            'transaction_id' => ($request->has('flexRadioDefault') && $request->flexRadioDefault == 'QR Code') ? 'required|string' : '',
            'scrnshot' => ($request->has('flexRadioDefault') && $request->flexRadioDefault == 'QR Code') ? 'required|image' : '',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'mobile.required' => 'Phone number is required',
            'address.required' => 'Address is required',
            'check_in.required' => 'Check-in date is required',
            'check_out.required' => 'Check-out date is required',
            'no_rooms.required' => 'Number of rooms is required',
            'room_id.required' => 'Room ID is required',
            'transaction_id.required' => 'Transaction ID is required when payment method is QR Code',
            'image.required' => 'Payment screenshot is required when payment method is QR Code',
        ]);

        $user = User::where('email',$request->email)->first();
        $rooms = Room::where('id',$request->room_id)->first();

        //upload scrnshot of payment
        if($request->has('file')){
            $file = $request->file('image');
            $imageName = time().'_'.rand(999,9999).'.'.$file->extension();
            $file->move(public_path('storage/screenshots'), $imageName);
        }

        //new

        $date1 = new DateTime($request->check_in);
        $date2 = new DateTime($request->check_out);
        $interval = $date1->diff($date2);

        $amt = (int)$rooms->price;

        $amount1 = ($amt * $interval->d * $request->no_rooms);

        $gst = round($amount1 * (18/100));
        $total = $amount1 + $gst;

        // $imageName = Session::get('guest_user_image');

        // dd('adcnnkas');
        //new


        $rooms->no_room_booked = $request->no_rooms;
        $rooms->available_rooms = $rooms->room_quantity - $request->no_rooms;
        $rooms->save();

        $imageName = Session::get('guest_user_image');


        if(!$user){
            // $imageName = time().'_'.rand(999,9999).'.'.$request->image->extension();
            // $request->image->move(public_path('storage/profile'), $imageName);
            $user = new User();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->phone_no = $request->mobile;
            $user->id_name  = $request->id_name;
            $user->picture  = $imageName;
            $user->address  = $request->address;
            $user->password = Hash::make(12345);
            $user->room_id = $request->room_id;
            $user->save();
        }else {
            $user->room_id = $request->room_id;
            $user->save();
        }

        $order = new Order();
        $order->user_id         = $user->id;
        $order->from_date       = $request->check_in;
        $order->to_date         = $request->check_out;
        $order->room_id         = $request->room_id;
        $order->quantity        = $request->no_rooms;
        $order->groos_amount    = $total;
        $order->discount        = '';
        $order->nett_amount     = $total;
        $order->adults          = $request->adults;
        $order->childrens       = $request->childrens;
        $order->payment_method  = $request->flexRadioDefault;
        $order->transaction_id  = $request->transaction_id;
        $order->screen_shot     = $imageName ?? null;
        $order->paid_status     = $request->flexRadioDefault == 'QR Code' ? 'paid' : 'unpaid';
        $order->status          = 'pending';
        $order->save();

        Session::forget('guest_user_image');

        toastr()->success('A confirnmation mail sent to your email address after verification');
        return redirect('/');
    }
    //new

    public function get_total_amount(Request $request){

        // dd($request->all());

        $data = Room::where('id', $request->id)->first();

        $amt = (int)$data->price;



        $amount2 = ($amt * $request->diffDays * $request->quantity);

        $gst = round($amount2 * (18/100));
        $total = $amount2 + $gst;


        return response()->json([
            'success' => 1,
            'amount' => $amount2,
            'gst' => $gst,
            'total' => $total
        ]);
    }

    public function get_total_room_available(Request $request){
        $data = Room::where('id', $request->id)->first();
        $rommNos = RoomNo::select('room_no')->where('room_id', $request->id)->pluck('room_no')->toArray();
        $getData = $this->getAvailableRoom($request->all(),$rommNos);
        return response()->json([
            'success' => 1,
            'totalRoomHas' => $getData
        ]);
    }

    public function getAvailableRoom($allReq,$rommNos){
        if($allReq['start_date'] !='' && $allReq['end_date'] !=''){
            if(($allReq['end_date'] >= $allReq['start_date']) && ($allReq['start_date'] <= $allReq['end_date'])){
                $order = Order::where(function ($query) use ($allReq) {
                    $query->select(DB::raw(1))
                    ->from('orders')
                    ->where('room_id',$allReq['id'])
                    ->where('from_date', '<', $allReq['end_date'])
                    ->where('to_date', '>', $allReq['start_date']);
                });
                if($order->get()->count() > 0){
                    $order = $order->get();
                    $roomNoGet = [];
                    foreach ($order as $orderkey => $ordervalue) {
                        if($ordervalue->room_no){
                            $decodeRoomNo = json_decode($ordervalue->room_no);
                            foreach ($decodeRoomNo as $key => $value) {
                                $roomNoGet[] = $value;
                            }
                        }
                    }
                    sort($rommNos);
                    sort($roomNoGet);
                    if(count($roomNoGet) >= count($rommNos)){
                        return 0;
                    }else{
                        $total = (count($rommNos) - count($roomNoGet));
                        return $total;
                    }
                }else{
                    return count($rommNos);
                }
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }


    //new

    public function gallery(){

        $gallery = Gallery::get();
        $images = $gallery->pluck('image');
        $videos = $gallery->pluck('video_url');
        return view('gallery',compact('images','videos'));
    }

    // public function searchByfilter(Request $request){


    //     // dd($request->all());
    //     if($request->facilities){
    //         $childrens = $request->childrens;
    //         $banner = Banner::where('section_name','room')->get();
    //         $facilities = Facilities::all();

    //         // $rooms = Room::where('available_rooms','!=',0)->whereNotBetween('from_date',[$request->fromDate, $request->toDate])->
    //         // whereNotBetween('to_date',[$request->fromDate,$request->toDate])->where('adults', '>=', $request->adults)
    //         // ->whereJsonContains('facilities', [$request->facilities])
    //         // ->orWhere(function ($query) use ($childrens) {
    //         //     // This closure adds an optional condition for the second column
    //         //     if (!empty($childrens)) {
    //         //         $query->where('childrens','>=', $childrens);
    //         //     }
    //         // })
    //         // ->get();

    //         $rooms = Room::where('available_rooms', '!=', 0)
    //         ->whereNotBetween('from_date', [$request->from_date, $request->to_date])
    //         ->whereNotBetween('to_date', [$request->from_date, $request->to_date])
    //         ->where('adults', '>=', $request->adults)
    //         ->whereJsonContains('facilities', [$request->facilities]);

    //         // Add condition for children if it's provided
    //         if ($request->has('no_children')) {
    //             echo "hello";
    //             die;
    //             $rooms->where('childrens', '>=', $request->childrens);
    //         }
    //         echo "abcd";
    //         die;

    //         $rooms = $rooms->get();


    //         return view('rooms',compact('rooms','banner','facilities'));

    //     }else {
    //         $childrens = $request->no_children;
    //         $banner = Banner::all();
    //         $brief = Brief::first();
    //         $facilities = Facilities::orderBy('id','asc')->take(5)->get();
    //         $testimonial = Testimonial::all();


    //       $rooms = Room::where('available_rooms', '!=', 0)
    //         ->whereNotBetween('from_date', [$request->from_date, $request->to_date])
    //         ->whereNotBetween('to_date', [$request->from_date, $request->to_date])
    //         ->where('adults', '>=', $request->no_adult);

    //         // Add condition for children if it's provided
    //         if ($request->has('no_children')) {
    //             echo "hello";
    //             die;
    //             $rooms->where('childrens', '>=', $request->no_children);
    //         }
    //         echo "abcd";
    //         die;

    //         $rooms = $rooms->take(3)->get();

    //         return view('index',compact('banner','rooms','facilities','brief','testimonial'));
    //     }


    // }

    // public function searchByfilter(Request $request){


    //     // dd($request->all());
    //     if($request->facilities){
    //         $childrens = $request->childrens;
    //         $banner = Banner::where('section_name','room')->get();
    //         $facilities = Facilities::all();

    //         $rooms = Room::where('available_rooms','!=',0)->whereNotBetween('from_date',[$request->fromDate, $request->toDate])->
    //         whereNotBetween('to_date',[$request->fromDate,$request->toDate])->where('adults', '>=', $request->adults)
    //         ->whereJsonContains('facilities', [$request->facilities])
    //         ->orWhere(function ($query) use ($childrens) {
    //             // This closure adds an optional condition for the second column
    //             if (!empty($childrens)) {
    //                 echo "hello";
    //                 $query->where('childrens','>=', $childrens);
    //             }
    //         })
    //         ->get();

    //         dd($rooms);

    //         $rooms = $rooms->get();


    //         return view('rooms',compact('rooms','banner','facilities'));

    //     }else {
    //         $childrens = $request->no_children;
    //         $banner = Banner::all();
    //         $brief = Brief::first();
    //         $facilities = Facilities::orderBy('id','asc')->take(5)->get();
    //         $testimonial = Testimonial::all();


    //         $rooms = Room::where('available_rooms', '!=', 0)
    //         ->whereNotBetween('from_date', [$request->fromDate, $request->toDate])
    //         ->whereNotBetween('to_date', [$request->fromDate, $request->toDate])
    //         ->where('adults', '>=', $request->no_adult)
    //         ->orWhere(function ($query) use ($childrens) {
    //             // This closure adds an optional condition for the 'childrens' column
    //             if (!empty($childrens)) {
    //                 $query->where('childrens','>=', $childrens);
    //             }
    //         })
    //         ->take(3)
    //         ->get();

    //         dd($rooms);

    //         // $rooms = Room::where('available_rooms', '!=', 0)
    //         // ->whereNotBetween('from_date', [$request->fromDate, $request->toDate])
    //         // ->whereNotBetween('to_date', [$request->fromDate, $request->toDate])
    //         // ->where('adults', '>=', $request->no_adult);

    //         // // Optional condition for children
    //         // if (!empty($request->no_children)) {
    //         //     $rooms->where('childrens', '>=', $request->no_children);
    //         // }

    //         // $rooms = $rooms->get();


    //         // dd($rooms);

    //         return view('index',compact('banner','rooms','facilities','brief','testimonial'));
    //     }


    // }

//     public function searchByfilter(Request $request){
//     if($request->facilities){
//         $banner = Banner::where('section_name','room')->get();
//         $facilities = Facilities::all();

//         $roomsQuery = Room::where('available_rooms','!=',0)
//             ->whereNotBetween('from_date',[$request->fromDate, $request->toDate])
//             ->whereNotBetween('to_date',[$request->fromDate,$request->toDate])
//             ->where('adults', '>=', $request->adults)
//             ->whereJsonContains('facilities', [$request->facilities]);

//         if ($request->has('childrens') && !empty($request->childrens)) {
//             $roomsQuery->where('childrens','>=', $request->childrens);
//         }

//         $rooms = $roomsQuery->get();

//         return view('rooms',compact('rooms','banner','facilities'));
//     } else {
//         $banner = Banner::all();
//         $brief = Brief::first();
//         $facilities = Facilities::orderBy('id','asc')->take(5)->get();
//         $testimonial = Testimonial::all();

//         $roomsQuery = Room::where('available_rooms', '!=', 0)
//             ->whereNotBetween('from_date', [$request->fromDate, $request->toDate])
//             ->whereNotBetween('to_date', [$request->fromDate, $request->toDate])
//             ->where('adults', '>=', $request->no_adult);

//         if ($request->has('no_children') && !empty($request->no_children)) {
//             $roomsQuery->where('childrens', '>=', $request->no_children);
//         }

//         $rooms = $roomsQuery->take(3)->get();

//         return view('index',compact('banner','rooms','facilities','brief','testimonial'));
//     }
// }


    public function searchByfilter(Request $request){
        $fromDate = $request->form_date;
        $toDate = $request->to_date;
        // dd($request->all());
        if ($request->facilities) {
            $banner = Banner::where('section_name', 'room')->get();
            $facilities = Facilities::all();

            $rooms = Order::
            where(function ($query) use ($fromDate, $toDate) {
                $query->whereBetween('from_date', [$fromDate, $toDate])
                    ->orWhereBetween('to_date', [$fromDate, $toDate]);
                })
            ->distinct()->pluck('room_id')->toArray();



            $roomsQuery = Room::where('available_rooms', '!=', 0)
                ->whereNotIn('id', $rooms)
                ->where('adults', '>=', $request->adults)
                ->whereJsonContains('facilities', [$request->facilities]);

            if ($request->has('childrens') && !empty($request->childrens)) {
                // dd('dfsd');
                $roomsQuery->where('childrens', '>=', $request->childrens);
            }

            $rooms = $roomsQuery->get();
            // dd($rooms);

            return view('rooms', compact('rooms', 'banner', 'facilities'));
        } else {
            // dd($request->all());
            $banner = Banner::all();
            $brief = Brief::first();
            $facilities = Facilities::orderBy('id', 'asc')->take(5)->get();
            $testimonial = Testimonial::all();

            $rooms = Order::
            where(function ($query) use ($fromDate, $toDate) {
                $query->whereBetween('from_date', [$fromDate, $toDate])
                    ->orWhereBetween('to_date', [$fromDate, $toDate]);
                })
            ->distinct()->pluck('room_id')->toArray();

            $roomsQuery = Room::where('available_rooms', '!=', 0)
                ->whereNotIn('id', $rooms)
                ->where('adults', '>=', $request->no_adult);

            if ($request->has('no_children') && !empty($request->no_children)) {

                $roomsQuery->where('childrens', '>=', $request->no_children);
            }

            $rooms = $roomsQuery->take(3)->get();

            return view('index', compact('banner', 'rooms', 'facilities', 'brief', 'testimonial'));
        }
    }


}
