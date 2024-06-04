
@include('inc.header')
<style>
    

    .swiper-slide {
      background-size: cover;
      background-position: center;
    }

    .mySwiper2 {
      height: 80%;
      width: 100%;
    }

    .room_swiper {
      height: 100%;
      box-sizing: border-box;
      padding: 10px 0;
    }

    .mySwiper .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
      opacity: 1;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
</style>
<section class="home_carousel food_home">
	<div class="swiper home_swiper">
      <div class="swiper-wrapper">
      
      @foreach($banner as $key => $values) 
			<div class="swiper-slide home_slide" style="background:url({{asset($values->banner)}});">
				<div class="overlay"></div>
			</div>
      @endforeach
			<!-- <div class="swiper-slide home_slide" style="background:url(../public/images/rooms/IMG_39782.png);">
			<div class="overlay"></div>
			</div> -->
			<!-- <div class="swiper-slide home_slide" style="background:url(../public/images/rooms/IMG_65019.png);">
			<div class="overlay"></div>
			</div> -->			
		</div>
	</div>
	<div class="food_bg_text">
		<h1>room details</h1>
  </div>
</section>
<section class="details_rooms">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 roomDetails_imgGallery">
                <div class="swiper room_swiper">
                    <div class="swiper-wrapper">
                        @php $image = json_decode($room->images,true)  @endphp
                        @foreach($image as $key => $value)
                        <div class="swiper-slide">
                           <a href="{{asset('public/storage/room/'.$value)}}" data-fancybox="gallery"> <img src="{{asset('public/storage/room/'.$value)}}" ></a>
                        </div>
                        
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div thumbsSlider="" class="swiper room_swiper2">
                    <div class="swiper-wrapper">
                        @foreach($image as $key => $value)
                        <div class="swiper-slide">
                            <img src="{{asset('public/storage/room/'.$value)}}" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 roomDetails_textInfo">
                <h2></h2>
                <div class="description_room">
                    <h5>{{$room->title}}</h5>
                    <p class="room_description">{!!$room->description!!}</p>
                </div>
                <div class="facility_box">
                    <h5>Facilities</h5>
                    <div class="row">
                        <div class="facility_content_box">
                            @foreach(json_decode($room->facilities,true) as $faKey => $faValue)
                            @php $facilities = DB::table('facilities')->where('name',$faValue)->first(); @endphp
                            <div class="content_box d-flex align-items-center">
                                <img width="30" height="30" src="{{asset('public/storage/facilities/'.@$facilities->icon)}}" alt="waiter"/>
                                <p class="ms-2 mb-0">{{ @$facilities->name }}</p>
                            </div>
                            @endforeach
                            <!--<div class="content_box d-flex align-items-center">-->
                            <!--    <img width="30" height="30" src="{{asset('public/images/icons8-ac-50.png')}}" alt="air-conditioner"/>-->
                            <!--    <p class="ms-2 mb-0">AC</p>-->
                            <!--</div>-->
                            <!--<div class="content_box d-flex align-items-center">-->
                            <!--    <img width="30" height="30" src="{{asset('public/images/icons8-swimming-48.png')}}" alt="external-glyph-travel-tanah-basah-glyph-tanah-basah-80"/>-->
                            <!--    <p class="ms-2 mb-0">Swiming Pool</p>-->
                            <!--</div>-->
                            <!--<div class="content_box d-flex align-items-center">-->
                            <!--    <img width="30" height="30" src="{{asset('public/images/icons8-lunch-32.png')}}" alt="lunch"/>-->
                            <!--    <p class="ms-2 mb-0">Lunch</p>-->
                            <!--</div>-->
                            <!--<div class="content_box d-flex align-items-center">-->
                            <!--    <img width="30" height="30" src="{{asset('public/images/icons8-breakfast-64.png')}}" alt="external-breakfast-travel-flatart-icons-outline-flatarticons"/>-->
                            <!--    <p class="ms-2 mb-0">Breakfast</p>-->
                            <!--</div>-->
                            <!--<div class="content_box d-flex align-items-center">-->
                            <!--    <img width="30" height="30" src="{{asset('public/images/icons8-shuttle-bus-50.png')}}" alt="bus2"/>-->
                            <!--    <p class="ms-2 mb-0">Shuttle</p>-->
                            <!--</div>-->
                        </div>
                        <!--@foreach(json_decode($room->facilities,true) as $faKey => $faValue)-->
                        <!--@php $facilities = DB::table('facilities')->where('name',$faValue)->first(); @endphp-->
                        <!--<div class="col-lg-1 facilityImgBox">-->
                        <!--    <img src="{{asset('public/storage/facilities/'.@$facilities->icon)}}" alt="" class="img-fluid">-->
                        <!--    <p class="ms-2 mb-0">{{ @$facilities->name }}</p>-->
                        <!--</div>-->
                        <!--@endforeach-->
                        
                        <div class="col-lg-12 mt-3">
                            <a href="{{route('room_booking',$room->slug)}}" class="btn book_btn"> <p>book now</p></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    @php $image = json_decode($room->images,true)  @endphp
                        @foreach($image as $key => $value)
                       
                        
                         <div class="modal fade" id="exampleslider{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                 <div class="swiper room_swiper" style="height:70vh;">
                    <div class="swiper-wrapper">
                        @php $image = json_decode($room->images,true)  @endphp
                        @foreach($image as $key => $value)
                        <div class="swiper-slide">
                            <img src="{{asset('public/storage/room/'.$value)}}"/>
                        </div>
                        
                        
                        
                        
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        
                        
    @endforeach
    <!--<div class="resent_view" style="background:url(Images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg)">-->
    <!--   <div class="container">-->
    <!--        <div class="swiper details_swiper">-->
    <!--            <h1 class="text-center">recently viewed</h1>-->
    <!--            <div class="swiper-wrapper">-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="details_box">-->
    <!--                        <img src="Images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="">-->
    <!--                        <div class="slide_detail_text_box">-->
    <!--                            <h4>hotel name</h4>-->
    <!--                            <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>-->
    <!--                            <div class="facility_box">-->
    <!--                                <h5>facilities</h5>-->
    <!--                                <div class="row">-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_27079.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
                                        
                                        
    <!--                                    <div class="price_box">-->
    <!--                                    <i class="bi bi-currency-rupee"></i>1500-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-12 mt-3">-->
    <!--                                        <a href="" class="btn book_btn"> <p>book now</p></a>-->
    <!--                                    </div>-->

    <!--                                </div>-->
    <!--                            </div> -->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="details_box">-->
    <!--                        <img src="Images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="">-->
    <!--                        <div class="slide_detail_text_box">-->
    <!--                            <h4>hotel name</h4>-->
    <!--                            <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>-->
    <!--                            <div class="facility_box">-->
    <!--                                <h5>facilities</h5>-->
    <!--                                <div class="row">-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_27079.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
                                        
                                        
    <!--                                    <div class="price_box">-->
    <!--                                    <i class="bi bi-currency-rupee"></i>1500-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-12 mt-3">-->
    <!--                                        <a href="" class="btn book_btn"> <p>book now</p></a>-->
    <!--                                    </div>-->

    <!--                                </div>-->
    <!--                            </div> -->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="details_box">-->
    <!--                        <img src="Images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="">-->
    <!--                        <div class="slide_detail_text_box">-->
    <!--                            <h4>hotel name</h4>-->
    <!--                            <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>-->
    <!--                            <div class="facility_box">-->
    <!--                                <h5>facilities</h5>-->
    <!--                                <div class="row">-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_27079.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
                                        
                                        
    <!--                                    <div class="price_box">-->
    <!--                                    <i class="bi bi-currency-rupee"></i>1500-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-12 mt-3">-->
    <!--                                        <a href="" class="btn book_btn"> <p>book now</p></a>-->
    <!--                                    </div>-->

    <!--                                </div>-->
    <!--                            </div> -->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="details_box">-->
    <!--                        <img src="Images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="">-->
    <!--                        <div class="slide_detail_text_box">-->
    <!--                            <h4>hotel name</h4>-->
    <!--                            <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>-->
    <!--                            <div class="facility_box">-->
    <!--                                <h5>facilities</h5>-->
    <!--                                <div class="row">-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_27079.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
                                        
                                        
    <!--                                    <div class="price_box">-->
    <!--                                    <i class="bi bi-currency-rupee"></i>1500-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-12 mt-3">-->
    <!--                                        <a href="" class="btn book_btn"> <p>book now</p></a>-->
    <!--                                    </div>-->

    <!--                                </div>-->
    <!--                            </div> -->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="details_box">-->
    <!--                        <img src="Images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="">-->
    <!--                        <div class="slide_detail_text_box">-->
    <!--                            <h4>hotel name</h4>-->
    <!--                            <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>-->
    <!--                            <div class="facility_box">-->
    <!--                                <h5>facilities</h5>-->
    <!--                                <div class="row">-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_27079.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
                                        
                                        
    <!--                                    <div class="price_box">-->
    <!--                                    <i class="bi bi-currency-rupee"></i>1500-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-12 mt-3">-->
    <!--                                        <a href="" class="btn book_btn"> <p>book now</p></a>-->
    <!--                                    </div>-->

    <!--                                </div>-->
    <!--                            </div> -->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="details_box">-->
    <!--                        <img src="Images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="">-->
    <!--                        <div class="slide_detail_text_box">-->
    <!--                            <h4>hotel name</h4>-->
    <!--                            <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>-->
    <!--                            <div class="facility_box">-->
    <!--                                <h5>facilities</h5>-->
    <!--                                <div class="row">-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_27079.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
                                        
                                        
    <!--                                    <div class="price_box">-->
    <!--                                    <i class="bi bi-currency-rupee"></i>1500-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-12 mt-3">-->
    <!--                                        <a href="" class="btn book_btn"> <p>book now</p></a>-->
    <!--                                    </div>-->

    <!--                                </div>-->
    <!--                            </div> -->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="details_box">-->
    <!--                        <img src="Images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="">-->
    <!--                        <div class="slide_detail_text_box">-->
    <!--                            <h4>hotel name</h4>-->
    <!--                            <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>-->
    <!--                            <div class="facility_box">-->
    <!--                                <h5>facilities</h5>-->
    <!--                                <div class="row">-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_27079.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
                                        
                                        
    <!--                                    <div class="price_box">-->
    <!--                                    <i class="bi bi-currency-rupee"></i>1500-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-12 mt-3">-->
    <!--                                        <a href="" class="btn book_btn"> <p>book now</p></a>-->
    <!--                                    </div>-->

    <!--                                </div>-->
    <!--                            </div> -->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="details_box">-->
    <!--                        <img src="Images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="">-->
    <!--                        <div class="slide_detail_text_box">-->
    <!--                            <h4>hotel name</h4>-->
    <!--                            <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>-->
    <!--                            <div class="facility_box">-->
    <!--                                <h5>facilities</h5>-->
    <!--                                <div class="row">-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_27079.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
                                        
                                        
    <!--                                    <div class="price_box">-->
    <!--                                    <i class="bi bi-currency-rupee"></i>1500-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-12 mt-3">-->
    <!--                                        <a href="" class="btn book_btn"> <p>book now</p></a>-->
    <!--                                    </div>-->

    <!--                                </div>-->
    <!--                            </div> -->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="details_box">-->
    <!--                        <img src="Images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg" alt="">-->
    <!--                        <div class="slide_detail_text_box">-->
    <!--                            <h4>hotel name</h4>-->
    <!--                            <p class="rooms_para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ullam tenetur, expedita iusto rem fugit.</p>-->
    <!--                            <div class="facility_box">-->
    <!--                                <h5>facilities</h5>-->
    <!--                                <div class="row">-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_27079.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bellboy.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/bus.png" alt="" class="img-fluid">-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-4 facilityImgBox">-->
    <!--                                        <img src="Images/Facilities/IMG_41622.svg" alt="" class="img-fluid">-->
    <!--                                    </div>-->
                                        
                                        
    <!--                                    <div class="price_box">-->
    <!--                                    <i class="bi bi-currency-rupee"></i>1500-->
    <!--                                    </div>-->
    <!--                                    <div class="col-lg-12 mt-3">-->
    <!--                                        <a href="" class="btn book_btn"> <p>book now</p></a>-->
    <!--                                    </div>-->

    <!--                                </div>-->
    <!--                            </div> -->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="swiper-pagination"></div>-->
    <!--        </div>-->
    <!--   </div>-->
    <!--   <div class="overlay"></div>-->
    <!--</div>-->
</section>



<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Fancybox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


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
    
    // // Initialize Magnific Popup
    // $(document).ready(function() {
    //     $('.lightbox').magnificPopup({
    //         type: 'image',
    //         gallery:{
    //             enabled:true
    //         }
    //     });
    // });
      // Initialize Fancybox
    // $(document).ready(function() {
    //     $("[data-fancybox]").fancybox({
    //         loop: true, // Enable loop
    //         infobar: false, // Disable infobar
    //         buttons: ["close"], // Show only close button
    //     });
    // });
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

