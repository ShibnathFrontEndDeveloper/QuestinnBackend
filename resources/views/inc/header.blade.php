
<!DOCTYPE html>
<html>
<head>
	<title>Quest Inn Beach Resort || Best Hotels in Mandarmani || Top Hotel and Resort Quest INN || Mandarmani Resort </title>
	<link rel="icon" type="image/x-icon" href="{{asset('public/images/faveicon.png')}}">
	<!-- CSS only -->
@include('inc.links')
	<link
	rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
	/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/common.css')}}">
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('public/css/toastr.css')}}"/>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<!--//newly add-->
	<!-- Magnific Popup CSS -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />-->


</head>
<body>

<div class="top_header">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center">
			<div class="adders_part">
				<i class="bi bi-geo-alt-fill"></i><p>Mondarmoni,West Bengal</p>
			</div>
			<div class="social_part">
				<a href="https://www.facebook.com/questinnbeachresort" target="_blank"><i class="bi bi-facebook"></i></a>
				
				<a href="https://www.youtube.com/@QuestInnBeachResort" target="_blank"><i class="bi bi-youtube"></i></a>
				<a href=""><i class="bi bi-instagram"></i></a>
			</div>
		</div>
	</div>
	<div class=" nav_head" id="stop_nav">
		<div class="container d-flex jusify-content-between align-items-center">
			<div class="bgLogo_navBar">
				<a href="{{url('/')}}"><img src="{{asset('public/images/questinn_logo_white.png')}}" alt="" class="brand"></a>
			</div>
			<div class="navbar_wrap">
				<ul class="navBar">
					<li class="navbar_list"><a href="{{route('index')}}" class="nav_link {{ request()->routeIs('index') ? 'active' : '' }}">Home</a></li>
					<li class="navbar_list"><a href="{{route('facilities')}}" class="nav_link {{ request()->routeIs('facilities') ? 'active' : '' }}">Facilities</a></li>
					<li class="navbar_list"><a href="{{route('about')}}" class="nav_link {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
					<li class="navbar_list"><a href="{{route('room')}}" class="nav_link {{ request()->routeIs('room') ? 'active' : '' }}">Room</a></li>
					<li class="navbar_list drop_menu_list"><a href="jacascript:void" class="nav_link {{ request()->routeIs('food') ? 'active' : '' }}">Food</a>
					@php $food_categories = DB::table('food_category')->where('status',1)->get() @endphp
					    <ul class="dropDown_menu">
							@foreach($food_categories as $keys => $values)
							<li class="navbar_list"><a href="{{route('foods',$values->id)}}" class="nav_link">{{$values->name}}</a></li>
							<!-- <li class="navbar_list"><a href="lunch.php" class="nav_link">Lunch</a></li>
							<li class="navbar_list"><a href="dinner.php" class="nav_link">Dinner</a></li> -->
							@endforeach
							<li class="navbar_list"><a href="{{route('food')}}" class="nav_link">See all Foods</a></li>
						</ul>
					</li>
					<li class="navbar_list"><a href="{{route('gallery')}}" class="nav_link {{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a></li>
					<li class="navbar_list"><a href="{{route('contact_us')}}" class="nav_link">Contact</a></li>
				</ul>
				<div class="log_btn_box">
				@if(Auth::User())
					<a href="{{route('logout')}}" class="btn">Logout</a>
					<a href="{{route('customers.profile')}}" class="btn">Profile</a>
				@else
					<a href="{{route('loginview')}}" class="btn">Login</a>
					<a href="{{route('register_view')}}" class="btn">Signup</a>
				@endif
				</div>
				@if(Auth::User() && Auth::User()->check_in_status == 1)
					@php 
					$cartQuantity = 0;
					if(Session::has('cart')){
						$cart = Session::get('cart');
						$cartQuantity = count($cart);	
					}@endphp
				
				<div class="cart_box">
					<button type="button" class="btn btn-primary position-relative" data-bs-target="#offcanvasRight" data-bs-toggle="offcanvas">
						<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
							<path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
						</svg>
						<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
							<span class="visually-visible">{{$cartQuantity}}</span>
						</span>
					</button>	
				</div>
				@endif
			</div>
			<div class="toggler_iconBox" id="navToggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop">
				<i class="bi bi-list"></i>
			</div>
		</div>
	</div>
</div>

<!-- cart box part -->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Cart</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
    
  <div class="offcanvas-body cart_detail_box">
  @if(request()->session()->has('cart'))
  @php $cart = request()->session()->get('cart');   @endphp   
  @php $total_amount = 0; @endphp
  @foreach($cart as $cartKey => $cartValue)
  @php $product = DB::table('food')->where('id',$cartValue['product_id'])->first(); @endphp  
	<div class="row align-items-center border-bottom">
		<div class="col-lg-4 col-sm-12 food_detailImg_box">
			<div class="food_box food_cart_box">
				<img src="{{asset('public/storage/foods/'.@$product->image)}}" alt="" class="img-fluid">
			</div>
		</div>		
		<div class="col-lg-8 roomDetails_textInfo">
			<div class="description_room">
				<h5 class="cart_product_heading">{{@$product->name}}</h5>
			</div>
			<div class="facility_box add_box">
				<h5><span id="chosen_price{{$cartKey}}"><i class="bi bi-currency-rupee"></i>{{@$cartValue['amount']}}</span></h5>
				<form action="" class="d-flex align-items-center counter_box mb-3">
					<!-- <button type="button" class="decrement_btn" onclick="dec_quantity('<?php echo 1 ?>','<?php echo $cartKey ?>','<?php echo $cartValue['amount'] ?>')"><i class="bi bi-file-minus"></i></button>
					<input type="text" value="1" id="food_cart_quantity{{$cartKey}}" class="counter_one form-control">
					<button type="button" class="increment_btn" onclick="inc_quantity('<?php echo 1 ?>','<?php echo $cartKey ?>','<?php echo $cartValue['amount'] ?>')"><i class="bi bi-plus"></i></button> -->
				</form>
				<div class="dlt_cartItem">
				    <i class="bi bi-trash3" onclick="remove_cart({{@$cartValue['product_id']}})"></i>
				</div>
			</div>
		</div>
	</div>
	@php $total_amount += $cartValue['amount']  @endphp
	@endforeach 
	@if($total_amount>0)
    	<div class="row mt-2 border-bottom">
    		<div class="col-8">
    			<h5>Total</h5>
    		</div>
    		<div class="col-4">
    			<h5><i class="bi bi-currency-rupee"></i>{{$total_amount}}</h5>
    		</div>
    	</div>
    	<div class="row">
		<div class="col-6 text-center cart_button_box">
			<a href="{{route('food_details')}}" class="btn book_btn"><p>View Cart Details</p></a>
		</div>
    	</div>
    	<div class="row">
    		<div class="col-12 text-center cart_button_box">
    			<a href="{{route('food_payment')}}" class="btn book_btn"><p>Place Order</p></a>
    		</div>
    	</div>
	@else
	    <div class="row mt-2 border-bottom">
    		<div class="col-12">
    			<h5>Cart is empty</h5>
    		</div>
    	</div>
	@endif

	@endif				
  </div>

</div>

<!-- Mobile Menu Part -->

<div class="offcanvas offcanvas-start mobile_offcanvas" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
  <div class="offcanvas-header">
  	<div class="bgLogo_navBar">
		<a href="index.php"><img src="{{asset('public/images/questinn_logo_white.png')}}" alt="" class="brand"></a>
	</div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
			<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
		</svg>
	</button>
  </div>
  <div class="offcanvas-body">
		<div class="mobile_navbar_wrap">
			<ul class="mobile_nav">
				<li class="navbar_list"><a href="{{route('index')}}" class="nav_link {{ request()->routeIs('index') ? 'active' : '' }}">Home</a></li>
				<li class="navbar_list"><a href="{{route('facilities')}}" class="nav_link {{ request()->routeIs('facilities') ? 'active' : '' }}">Facilities</a></li>
				<li class="navbar_list"><a href="{{route('about')}}" class="nav_link {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
				<li class="navbar_list"><a href="{{route('room')}}" class="nav_link {{ request()->routeIs('room') ? 'active' : '' }}">Room</a></li>
				<li class="navbar_list"><a href="{{route('food')}}" class="nav_link {{ request()->routeIs('food') ? 'active' : '' }}">Food</a></li>
				<li class="navbar_list"><a href="{{route('gallery')}}" class="nav_link {{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a></li>
				<li class="navbar_list"><a href="{{route('contact_us')}}" class="nav_link {{ request()->routeIs('contact_us') ? 'active' : '' }}">Contact</a></li>
			</ul>
			<div class="mobile_log_btn_box">
			@if(Auth::User())
				<a href="{{route('logout')}}" class="btn">Logout</a>
				<a href="{{route('customers.profile')}}" class="btn">Profile</a>
			@else
				<a href="{{route('loginview')}}" class="btn">Login</a>
				<a href="{{route('register_view')}}" class="btn">Signup</a>
			@endif
			</div>
			<div class="cart_box">
				<button type="button" class="btn btn-primary position-relative" data-bs-target="#offcanvasRight" data-bs-toggle="offcanvas">
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
						<path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
					</svg>
					<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
						<span class="visually-visible">0</span>
					</span>
				</button>	
			</div>
		</div>
	</div>
</div>

<script src="{{asset('public/js/common.js')}}"></script>






	

