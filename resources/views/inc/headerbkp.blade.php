
<!DOCTYPE html>
<html>
<head>
	<title>Hotel Booking Website</title>
	<!-- CSS only -->
@include('inc.links')
	<link
	rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
	/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/common.css')}}">
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css"/>
	<link rel="stylesheet" href="{{asset('public/css/toastr.css')}}"/>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
</head>
<body>


<div class="top_header d-flex justify-content-between align-items-center">
	<div class="adders_part">
	<i class="bi bi-geo-alt-fill"></i><p>Mondarmoni,West Bengal</p>
	</div>
	<div class="social_part">
		<a href=""><i class="bi bi-facebook"></i></a>
		<a href=""><i class="bi bi-twitter"></i></a>
		<a href=""><i class="bi bi-youtube"></i></a>
		<a href=""><i class="bi bi-instagram"></i></a>
	</div>

</div>

<!-- <nav class="navbar navbar-expand-lg px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php"><img src="{{asset('public/images/questinn_logo_white.png')}}" alt="" class="brand"></a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="rooms.php">Rooms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('facilities')}}">Facilities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('contact_us')}}">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('about')}}">About</a>
        </li>
		<li class="nav-item">
          <a class="nav-link me-2" href="{{route('food')}}">Food</a>
        </li>
        
      </ul>
      <div class="d-flex justify-content-end log_btn_box" role="search">
	  	@if(Auth::User())
		  <a href="{{route('logout')}}"><button  class="btn" type="button" >LOG OUT</button></a>
		@else
		<button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#loginModel">Login	</button>
        <button type="button" class="btn mx-3" data-bs-toggle="modal" data-bs-target="#registerModel">Register	</button>		
		@endif
	</div>
    </div>
  </div>
</nav> -->


<nav class="navbar navbar-expand-lg px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php"><img src="{{asset('public/images/questinn_logo_white.png')}}" alt="" class="brand"></a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav justify-content-end">
	  <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('index')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('room')}}">Rooms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('facilities')}}">Facilities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('contact_us')}}">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('about')}}">About</a>
        </li>
		
		
		<li class="nav-item">
          <a class="nav-link me-2" href="{{route('food')}}">Food</a>
        </li>
	
      </ul>
      <div class="d-flex justify-content-end" role="search">
	  	@if(Auth::User())
		  <a href="{{route('logout')}}" class="btn book_btn"><p>LOG OUT</p></a>
		  <a href="{{route('customers.profile')}}" class="btn book_btn ms-3"><p>Profile</p></a>
		@else
		<a href="{{route('loginview')}}" class="btn book_btn"><p>Login</p></a>
        <a href="{{route('register_view')}}" class="btn book_btn ms-3"><p>Signup</p></a>
		@endif
      </div>	  
	  @if(Auth::User() && Auth::User()->check_in_status == 1)
	  @php 
	  $cartQuantity = 0;
	  if(Session::has('cart')){
			$cart = Session::get('cart');
			$cartQuantity = count($cart);	
	  }@endphp
	  <div class="cart_box position-relative">
		<i class="bi bi-basket-fill" data-bs-target="#cart_box" data-bs-toggle="offcanvas"></i>
		<span class="position-absolute top-10 start-65 translate-middle badge rounded-pill bg-primary">
			{{$cartQuantity}}
		</span>
	  </div>
	  @endif
    </div>
	
  </div>
</nav>

<div class="offcanvas offcanvas-end" tabindex="-1" id="cart_box" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Cart</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  @if(request()->session()->has('cart'))
  @php $cart = request()->session()->get('cart');   @endphp   
  @php $total_amount = 0; @endphp
  @foreach($cart as $cartKey => $cartValue)  
  <div class="offcanvas-body cart_detail_box">
	<div class="row align-items-center border-bottom">
		<div class="col-lg-4 col-sm-12 food_detailImg_box">
			<div class="food_box food_cart_box">
				@php $product = DB::table('food')->where('id',$cartValue['product_id'])->first(); @endphp				
				<img src="{{asset('public/storage/foods/'.$product->image)}}" alt="" class="img-fluid">
			</div>
		</div>
		<div class="col-lg-8 roomDetails_textInfo">
			<div class="description_room">
				<h5 class="cart_product_heading">{{$product->name}}</h5>
			</div>
			<div class="facility_box add_box">
				<h5><span id="chosen_price{{$cartKey}}"><i class="bi bi-currency-rupee"></i>{{$cartValue['amount']}}</span></h5>
				<form action="" class="d-flex align-items-center counter_box mb-3">
					<!-- <input type="text" value="{{$cartValue['quantity']}}" class="counter_one form-control"/>
					<button type="button" class="increment_btn"><i class="bi bi-plus"></i></button> -->
					<button type="button" class="decrement_btn" onclick="dec_quantity('<?php echo 1 ?>','<?php echo $cartKey ?>','<?php echo $cartValue['amount'] ?>')"><i class="bi bi-file-minus"></i></button>     
                    <input type="text" name="quantity" value="1" id="food_cart_quantity{{$cartKey}}" class="counter_one form-control"/>
                    <button type="button" class="increment_btn" onclick="inc_quantity('<?php echo 1 ?>','<?php echo $cartKey ?>','<?php echo $cartValue['amount'] ?>')"><i class="bi bi-plus"></i></button>
				</form>
			</div>
		</div>
	</div>
	@php $total_amount += $cartValue['amount']  @endphp
	@endforeach 
	<div class="row mt-2">
		<div class="col-8">
			<h5>Total</h5>
		</div>
		<div class="col-4">
			<h5><i class="bi bi-currency-rupee"></i>{{$total_amount}}</h5>
		</div>
	</div>
	<div class="row border-top">
		<div class="col-12 text-center mt-2">
			<a href="{{route('food_details')}}" class="btn book_btn"><p>Place Order</p></a>
		</div>
	</div>
	@endif
  </div>
</div>













<div class="modal fade" id="loginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	<form action="{{route('login')}}" method="POST">
			@csrf
    		<div class="modal-header">
        	<h5 class="modal-title d-flex align-items-center">
        	<i class="bi bi-person-circle fs-3 me-2">User Login</i>
        	</h5>
        	<button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<div class="modal-body">
        	<div class="mb-3">
    			<label class="form-label">Email address</label>
    			<input type="email" class="form-control shadow-none" name="email">
  			  </div>
  			<div class="mb-4">
    			<label class="form-label">Password</label>
    			<input type="password" class="form-control shadow-none" name="password">
  			</div>
  			<div class="d-flex align-items-center justify-content-between mb-2">
  				<button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
  				<a href="JavaScript: void(0)" class="text-secondary text-decoration-none" >Forgot Password</a>
  			</div>
      		</div>
      		<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        	<button type="button" class="btn btn-primary">Understood</button>
      		</div>
    	</form>
      
    </div>
  </div>
</div>

<div class="modal fade" id="registerModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	
    	<form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
			@csrf
    		<div class="modal-header">
        	<h5 class="modal-title d-flex align-items-center">
        	<i class="bi bi-person-lines-fill fs-3 me-2">User Registration</i>
        	</h5>
        	<button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<div class="modal-body">
      			<span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Note: Your details must match with your ID (Aadhaar card, passport, driving license, etc.) that will be required during check-in.
    			</span>
    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-md-6 ps-0 mb-3">
    					<label class="form-label">Name</label>
    					<input type="text" class="form-control shadow-none" name="name">
    				</div>
    				<div class="col-md-6 p-0">
    					<label class="form-label">Email</label>
    					<input type="email" class="form-control shadow-none" name="email">
    				</div>
    				<div class="col-md-6 ps-0 mb-3">
    					<label class="form-label">Phone Number</label>
    					<input type="number" class="form-control shadow-none" name="phone_number">
    				</div>
    				<div class="col-md-6 p-0">
    					<label class="form-label">Picture</label>
    					<input type="file" class="form-control shadow-none" name="image">
    				</div>
    				<div class="col-md-12 p-0">
    					<label class="form-label">Address</label>
    					<textarea class="form-control shadow-none" name="address" rows="1"></textarea>
    				</div>
    				<div class="col-md-6 ps-0 mb-3">
    					<label class="form-label">Pin Code</label>
    					<input type="number" class="form-control shadow-none" name="pin_code">
    				</div>
    				<div class="col-md-6 p-0">
    					<label class="form-label">Date of Birth</label>
    					<input type="date" class="form-control shadow-none" name="dob">
    				</div>
    				<div class="col-md-6 ps-0 mb-3">
    					<label class="form-label">Password</label>
    					<input type="passport" class="form-control shadow-none" name="password">
    				</div>
    				<div class="col-md-6 p-0">
    					<label class="form-label">Confirm Password</label>
    					<input type="passport" class="form-control shadow-none" name="confirm_password">
    				</div>
    				<div class="text-center my-1">
    					<button type="submit" class="btn btn-dark shadow-none">Register</button>
    				</div>
    			</div>
    		</div>	
        	
    	</form>
      
    </div>
  </div>
</div>
	
</div>