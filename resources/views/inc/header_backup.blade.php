

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

<div class="top_header">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center">
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
	</div>
	<div class=" nav_head" id="stop_nav">
		<div class="container d-flex jusify-content-between align-items-center">
			<div class="bgLogo_navBar">
				<a href="index.php"><img src="images/questinn_logo_white.png" alt="" class="brand"></a>
			</div>
			<div class="navbar_wrap">
				<ul class="navBar">
					<li class="navbar_list"><a href="index.php" class="nav_link active">Home</a></li>
					<li class="navbar_list"><a href="facilities.php" class="nav_link">Facilities</a></li>
					<li class="navbar_list"><a href="about.php" class="nav_link">About</a></li>
					<li class="navbar_list"><a href="rooms.php" class="nav_link">Room</a></li>
					<li class="navbar_list"><a href="food.php" class="nav_link">Food</a></li>
					<li class="navbar_list"><a href="contact.php" class="nav_link">Contact</a></li>
				</ul>
				<div class="log_btn_box">
					<a href="login.php" class="btn">Login</a>
					<a href="signup.php" class="btn">Signup</a>
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
	<div class="row align-items-center border-bottom">
		<div class="col-lg-4 col-sm-12 food_detailImg_box">
			<div class="food_box food_cart_box">
				<img src="images/Foods/sandwich-cup-coffee-table.jpg" alt="" class="img-fluid">
			</div>
		</div>
		<div class="col-lg-8 roomDetails_textInfo">
			<div class="description_room">
				<h5 class="cart_product_heading">JELLY BREAD WITH ORANGE JUICE</h5>
			</div>
			<div class="facility_box add_box">
				<h5><span class="discount_price"><i class="bi bi-currency-rupee"></i>2500</span> <i class="bi bi-currency-rupee"></i>2000</h5>
				<form action="" class="d-flex align-items-center counter_box mb-3">
					<input type="text" value="1" class="counter_one form-control">
					<button type="button" class="increment_btn"><i class="bi bi-plus"></i></button>
				</form>
			</div>
		</div>
	</div>
	<div class="row mt-2 border-bottom">
		<div class="col-8">
			<h5>Total</h5>
		</div>
		<div class="col-4">
			<h5><i class="bi bi-currency-rupee"></i>2000</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-6 text-center cart_button_box">
			<a href="food_details.php" class="btn book_btn"><p>View Cart Details</p></a>
		</div>
	</div>
	<div class="row">
		<div class="col-12 text-center cart_button_box">
			<a href="order_details.php" class="btn book_btn"><p>Place Order</p></a>
		</div>
	</div>

  </div>
</div>

<!-- Mobile Menu Part -->

<div class="offcanvas offcanvas-start mobile_offcanvas" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
  <div class="offcanvas-header">
  	<div class="bgLogo_navBar">
		<a href="index.php"><img src="images/questinn_logo_white.png" alt="" class="brand"></a>
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
				<li class="navbar_list"><a href="index.php" class="nav_link active">Home</a></li>
				<li class="navbar_list"><a href="facilities.php" class="nav_link">Facilities</a></li>
				<li class="navbar_list"><a href="about.php" class="nav_link">About</a></li>
				<li class="navbar_list"><a href="rooms.php" class="nav_link">Room</a></li>
				<li class="navbar_list"><a href="food.php" class="nav_link">Food</a></li>
				<li class="navbar_list"><a href="contact.php" class="nav_link">Contact</a></li>
			</ul>
			<div class="mobile_log_btn_box">
				<a href="login.php" class="btn">Login</a>
				<a href="signup.php" class="btn">Signup</a>
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




	

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/common.js"></script>
