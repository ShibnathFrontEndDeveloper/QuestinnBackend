@include('inc.header')
<section class="home_carousel food_home">
	<div class="swiper home_swiper">
      <div class="swiper-wrapper">
            @foreach($banner as $key => $values) 
			<div class="swiper-slide home_slide" style="background:url({{asset($values->banner)}});">
				<div class="overlay"></div>
			</div>
            @endforeach
			<!-- <div class="swiper-slide home_slide" style="background:url(../public/images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg);">
				<div class="overlay"></div>
			</div>
			<div class="swiper-slide home_slide" style="background:url(../public/images/rooms/IMG_39782.png);">
			<div class="overlay"></div>

			</div>
			<div class="swiper-slide home_slide" style="background:url(../public/images/rooms/IMG_65019.png);">
			<div class="overlay"></div>

			</div> -->
			
		</div>
	</div>
	<div class="food_bg_text">
		<h1>room booking</h1>
  </div>
</section>
<section class="details_rooms">
    <div class="container">
        <h1 class="booking_heading">Booking</h1>
        <div class="row">
            <div class="col-lg-8 room_booking_box">
                <form action="{{route('room_booked')}}" method="POST" enctype="multipart/form-data" class="booking_form">
                    @csrf 
                    <div class="logo_box">
                        <a href=""><img src="{{asset('public/images/questinn_logo_white.png')}}" alt="" srcset="" class="img-fluid"></a>
                    </div>
                    
                    <div class="row">
                        @if(Auth::User())
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required value="{{Auth::User()->name}}">
                                <input type="hidden" name="room_id" class="form-control"  value="{{$room->id}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" readonly value="{{Auth::User()->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="tel" name="mobile" class="form-control" readonly value="{{Auth::User()->phone_no}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" readonly value="{{Auth::User()->address}}">
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">ID</label>
                                <select name="id_name" id="" class="form-select">
                                    <option value="1" select>Pan Card</option>
                                    <option value="1">Aadhaar Card</option>
                                    <option value="1">Voter Card</option>
                                    <option value="1">Driving Licence</option>
                                </select>
                                @if($errors->has('name'))
                                    <div><span class="text-danger">{{ $errors->first('name') }}</span></div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">ID Photo</label>
                                <input type="file" class="form-control" name="image">
                                @if ($errors->has('name'))
                                    <div><span class="text-danger">{{ $errors->first('name') }}</span></div>
                                @endif
                            </div>
                        </div>  -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Country</label>
                                <select name="country" id="country" class="form-select">
                                    <option value="india" select>India</option>
                                    <option value="england">England</option>
                                    <option value="usa">USA</option>
                                    <option value="philippines">Philippines</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Check In</label>
                                <input type="date" name="check_in" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Check Out</label>
                                <input type="date" name="check_out" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">No. of Adults(Max allowed)</label>
                                <input type="number" name="adults" class="form-control" value="{{$room->adults}}" readonly >                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">No. of Children(Max allowed)</label>
                                <input type="number" name="childrens" class="form-control" value="{{$room->childrens}}" readonly >                                
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">No. of Rooms(Available)</label>
                                <select name="no_rooms" id="" class="form-select">
                                    @for($i = 1;$i <= $room->available_rooms; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        @else                        
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required placeholder="Name">
                                <input type="hidden" name="room_id" class="form-control"  value="{{$room->id}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="tel" name="mobile" class="form-control" required placeholder="Mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" required placeholder="Address">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">ID</label>
                                <select name="id_name" id="" class="form-select">
                                    <option value="pan_card" select>Pan Card</option>
                                    <option value="aadhar_card">Aadhaar Card</option>
                                    <option value="voter_card">Voter Card</option>
                                    <option value="driving_license">Driving Licence</option>
                                </select>
                                @if($errors->has('name'))
                                    <div><span class="text-danger">{{ $errors->first('name') }}</span></div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">ID Photo</label>
                                <input type="file" class="form-control" name="image">
                                @if ($errors->has('name'))
                                    <div><span class="text-danger">{{ $errors->first('name') }}</span></div>
                                @endif
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Country</label>
                                <select name="country" id="country" class="form-select">
                                    <option value="india" select>India</option>
                                    <option value="england">England</option>
                                    <option value="usa">USA</option>
                                    <option value="philippines">Philippines</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Check In</label>
                                <input type="date" name="check_in" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Check Out</label>
                                <input type="date" name="check_out" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">No. of Adults(Max allowed)</label>
                                <input type="number" name="adults" class="form-control" value="{{$room->adults}}" readonly >                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">No. of Children(Max allowed)</label>
                                <input type="number" name="childrens" class="form-control" value="{{$room->childrens}}" readonly >                                
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">No. of Rooms(Available)</label>
                                <select name="no_rooms" id="" class="form-select">
                                    @for($i = 1;$i <= $room->available_rooms; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="form-group mb-3">
                            <button type="submit" class="btn ">Book Now</button>
                        </div>                    
                    </div>
                </form>    
            </div>
            <div class="col-lg-4">
                <div class="roombooking_details">
                    <div class="booking-img_box">
                        <img src="../public/images/rooms/room-2.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="booking_about_text">
                        <!--<h1 class="booking_heading mt-3">About Questinn</h1>-->
                        <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, ipsam voluptas autem laboriosam dolores incidunt nulla facere facilis officia veritatis eum dolorem doloribus enim obcaecati! Dolorum, tempore quia sit suscipit voluptates explicabo in sunt dolor! Cupiditate, soluta reprehenderit sequi eius ducimus quibusdam amet recusandae nostrum vero veritatis. Delectus, veniam dolorem.</p>-->
                    </div>
                    <div class="booking_about_text">
                        <div class="reviwe_payment">
                            <a href=""><i class="bi bi-arrow-left"></i><span>Reviwe Payment</span></a>
                        </div>
                        <div class="card price_dev">
                            <h5>Price Breakpart</h5>
                            <div class="rounded">
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="descrip">
                                        <p class="mb-0">1 Room x 2nights</p>
                                    </div>
                                    <div class="amount"><i class="bi bi-currency-rupee"></i>1,500</div>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="descrip">
                                        <p class="mb-0">GSTN</p>
                                    </div>
                                    <div class="amount"><i class="bi bi-percent"></i>18</div>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="descrip">
                                        <p class="mb-0 tlt_price_b">Total Amount to be paid</p>
                                    </div>
                                    <div class="amount tlt_price_b"><i class="bi bi-currency-rupee"></i>1,500</div>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center last">
                                    <div class="descrip">
                                        <p class="mb-0 tlt_price"><i class="bi bi-currency-rupee"></i>1,500</p>
                                        <span>Including of all taxes</span>
                                    </div>
                                    <div class="amount"><button class="btn">Continue</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- <div class="resent_view" style="background:url(../public/images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg)">
       <div class="container">
            <div class="swiper details_swiper">
                <h1 class="text-center">recently viewed</h1>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="details_box">
                            <img src="../public/images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="" class="img-fluid">
                            <div class="slide_detail_text_box">
                                <h4>hotel name</h4>
                                <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>
                                <div class="facility_box">
                                    <h5>facilities</h5>
                                    <div class="row">
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_27079.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        
                                        
                                        <div class="price_box">
                                        <i class="bi bi-currency-rupee"></i>1500
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <a href="" class="btn book_btn"> <p>book now</p></a>
                                        </div>

                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="details_box">
                            <img src="../public/images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="" class="img-fluid">
                            <div class="slide_detail_text_box">
                                <h4>hotel name</h4>
                                <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>
                                <div class="facility_box">
                                    <h5>facilities</h5>
                                    <div class="row">
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_27079.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="images/Facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        
                                        
                                        <div class="price_box">
                                        <i class="bi bi-currency-rupee"></i>1500
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <a href="" class="btn book_btn"> <p>book now</p></a>
                                        </div>

                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="details_box">
                            <img src="../public/images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="" class="img-fluid">
                            <div class="slide_detail_text_box">
                                <h4>hotel name</h4>
                                <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>
                                <div class="facility_box">
                                    <h5>facilities</h5>
                                    <div class="row">
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_27079.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        
                                        
                                        <div class="price_box">
                                        <i class="bi bi-currency-rupee"></i>1500
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <a href="" class="btn book_btn"> <p>book now</p></a>
                                        </div>

                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="details_box">
                            <img src="../public/images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="" class="img-fluid">
                            <div class="slide_detail_text_box">
                                <h4>hotel name</h4>
                                <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>
                                <div class="facility_box">
                                    <h5>facilities</h5>
                                    <div class="row">
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_27079.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        
                                        
                                        <div class="price_box">
                                        <i class="bi bi-currency-rupee"></i>1500
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <a href="" class="btn book_btn"> <p>book now</p></a>
                                        </div>

                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="details_box">
                            <img src="../public/images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="" class="img-fluid">
                            <div class="slide_detail_text_box">
                                <h4>hotel name</h4>
                                <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>
                                <div class="facility_box">
                                    <h5>facilities</h5>
                                    <div class="row">
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_27079.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        
                                        
                                        <div class="price_box">
                                        <i class="bi bi-currency-rupee"></i>1500
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <a href="" class="btn book_btn"> <p>book now</p></a>
                                        </div>

                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="details_box">
                            <img src="../public/images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="" class="img-fluid">
                            <div class="slide_detail_text_box">
                                <h4>hotel name</h4>
                                <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>
                                <div class="facility_box">
                                    <h5>facilities</h5>
                                    <div class="row">
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_27079.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        
                                        
                                        <div class="price_box">
                                        <i class="bi bi-currency-rupee"></i>1500
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <a href="" class="btn book_btn"> <p>book now</p></a>
                                        </div>

                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="details_box">
                            <img src="../public/images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="" class="img-fluid">
                            <div class="slide_detail_text_box">
                                <h4>hotel name</h4>
                                <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>
                                <div class="facility_box">
                                    <h5>facilities</h5>
                                    <div class="row">
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_27079.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        
                                        
                                        <div class="price_box">
                                        <i class="bi bi-currency-rupee"></i>1500
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <a href="" class="btn book_btn"> <p>book now</p></a>
                                        </div>

                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="details_box">
                            <img src="../public/images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="" class="img-fluid">
                            <div class="slide_detail_text_box">
                                <h4>hotel name</h4>
                                <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>
                                <div class="facility_box">
                                    <h5>facilities</h5>
                                    <div class="row">
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_27079.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        
                                        
                                        <div class="price_box">
                                        <i class="bi bi-currency-rupee"></i>1500
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <a href="" class="btn book_btn"> <p>book now</p></a>
                                        </div>

                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="details_box">
                            <img src="../public/images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="" class="img-fluid">
                            <div class="slide_detail_text_box">
                                <h4>hotel name</h4>
                                <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>
                                <div class="facility_box">
                                    <h5>facilities</h5>
                                    <div class="row">
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_27079.svg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bellboy.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/bus.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-4 facilityImgBox">
                                            <img src="../public/images/facilities/IMG_41622.svg" alt="" class="img-fluid">
                                        </div>
                                        
                                        
                                        <div class="price_box">
                                        <i class="bi bi-currency-rupee"></i>1500
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <a href="" class="btn book_btn"> <p>book now</p></a>
                                        </div>

                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
       </div>
       <div class="overlay"></div>
    </div> -->
</section>






<script>
  var swiper = new Swiper(".home_swiper", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
        	delay: 10000,
        	disableOnInteraction: false,
        }
      });

      var swiper = new Swiper(".room_swiper2", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".room_swiper", {
      spaceBetween: 10,
      
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });


    var swiper = new Swiper(".details_swiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        425: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
      },
    });
</script>

@include('inc.footer')


</body>
</html>