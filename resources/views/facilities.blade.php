

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

			</div> -->
			<!-- <div class="swiper-slide home_slide" style="background:url(images/rooms/IMG_65019.png);">
			<div class="overlay"></div>

			</div> -->
			
		</div>
	</div>
	<div class="food_bg_text">
		<h1>Facilities</h1>
  </div>
</section>

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>

  <div class="h-line bg-dark"></div>
  <p class="text-center mt-3">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat.
  </p>
</div>

<div class="container">
  <div class="row">
    @foreach($facilities as $faKey => $fa_value)
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
          <img src="{{asset('public/storage/facilities/'.$fa_value->icon)}}" width="40px">
          <h5 class="m-0 ms-3">{{$fa_value->name}}</h5>
        </div>  
          <p>
           {!!$fa_value->desc!!}
          </p> 
      </div>
    </div>
    @endforeach
    <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
          <img src="images/facilities/Wifi.svg" width="40px">
          <h5 class="m-0 ms-3">Wifi</h5>
        </div>  
          <p>
           Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua.
          </p> 
      </div>
    </div> -->
    <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
          <img src="images/facilities/Wifi.svg" width="40px">
          <h5 class="m-0 ms-3">Wifi</h5>
        </div>  
          <p>
           Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua.
          </p> 
      </div>
    </div> -->
    <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
          <img src="images/facilities/Wifi.svg" width="40px">
          <h5 class="m-0 ms-3">Wifi</h5>
        </div>  
          <p>
           Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua.
          </p> 
      </div>
    </div> -->
    <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
          <img src="images/facilities/Wifi.svg" width="40px">
          <h5 class="m-0 ms-3">Wifi</h5>
        </div>  
          <p>
           Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua.
          </p> 
      </div>
    </div> -->
    <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
          <img src="images/facilities/Wifi.svg" width="40px">
          <h5 class="m-0 ms-3">Wifi</h5>
        </div>  
          <p>
           Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua.
          </p> 
      </div>
    </div> -->
  </div>
</div>

@include('inc.footer')


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
</body>
</html>