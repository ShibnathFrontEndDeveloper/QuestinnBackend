
@include('inc.header')
<section class="home_carousel food_home">
	<div class="swiper home_swiper">
      <div class="swiper-wrapper">
      @foreach($banner as $keys => $values) 
			<div class="swiper-slide home_slide" style="background:url(<?php echo $values->banner ?>);">
				<div class="overlay"></div>
			</div>
      @endforeach
			<!-- <div class="swiper-slide home_slide" style="background:url(images/rooms/IMG_39782.png);">
			<div class="overlay"></div>
			</div>

			<div class="swiper-slide home_slide" style="background:url(images/rooms/IMG_65019.png);">
			<div class="overlay"></div>
			</div> -->

		</div>
	</div>
	<div class="food_bg_text">
		<h1>about</h1>
  </div>
</section>

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">ABOUT US</h2>

  <div class="h-line bg-dark"></div>
  <p class="text-center mt-3">
    {{$about->title}}
  </p>
</div>

<div class="container">
  <div class="row justify-content-between align-items-center">
    <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
      <h3 class="mb-3">{{$about->heading}}</h3>
      <p>
      {!!$about->description!!}
      </p>
    </div>
    <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
      <img src="{{asset('public/storage/about/'.$about->image)}}" class="w-100">
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="{{asset('public/storage/about/'.$about->rooms_icon)}}" width="70px">
        <h4 class="mt-3">{{$about->room_no}}+ ROOMS</h4>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="{{asset('public/storage/about/'.$about->customers_icon)}}" width="70px">
        <h4 class="mt-3">{{$about->customers_no}}+ CUSTOMERS</h4>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="{{asset('public/storage/about/'.$about->reviews_icon)}}" width="70px">
        <h4 class="mt-3">{{$about->review_no}}+ REVIEWS</h4>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="{{asset('public/storage/about/'.$about->staffs_icon)}}" width="70px">
        <h4 class="mt-3">{{$about->staff_no}}+ STAFFS</h4>
      </div>
    </div>
  
  </div>
</div>

<h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

<div class="container px-4">
   <div class="swiper mySwiper">
      <div class="swiper-wrapper mb-5">
        @foreach($management as $key => $value)
        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="{{asset('public/storage/about/'.$value->image)}}" class="w-100">
          <h5 class="mt-2">{{$value->name}}</h5>
        </div>
        @endforeach
        <!-- <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="{{asset('public/images/about/about.jpg')}}" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div> -->
        <!-- <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="{{asset('public/images/about/about.jpg')}}" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div> -->
        <!-- <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="{{asset('public/images/about/about.jpg')}}" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div> -->
        <!-- <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="{{asset('public/images/about/about.jpg')}}" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div> -->
        
        <!-- <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="{{asset('public/images/about/about.jpg')}}" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div> -->
        <!-- <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="{{asset('public/images/about/about.jpg')}}" class="w-100">
          <h5 class="mt-2">Random Name</h5>
        </div> -->
      </div>
      <div class="swiper-pagination"></div>
    </div>
</div>

@include('inc.footer')


 <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
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
    </script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 40,
        pagination: {
          el: ".swiper-pagination",
        },
        breakpoints: {
          320: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 3,
          },
          1024: {
            slidesPerView: 3,
          },
        }
      });
    </script>
</body>
</html>