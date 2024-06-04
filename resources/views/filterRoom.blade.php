<section class="home_carousel food_home" >
	<div class="swiper home_swiper" >
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
		<h1>rooms</h1>
  </div>
</section>

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>

  <div class="h-line bg-dark"></div>
 
</div>

<div class="container">
  <div class="row">
   <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-0">

     <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
  <div class="container-fluid flex-lg-column align-items-stretch">
    <h4 class="mt-2">FILTERS</h4>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form id="searchByFilter">
      @csrf
    <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
      <div class="border bg-light p-3 rounded mb-3">
        <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
        <label class="form-label">Check-In</label>
        <input type="date" name="form_date" id="from_date" value="" onchange="formDate(this.value)" class="form-control shadow-none mb-3">
        <label class="form-label">Check-Out</label>
        <input type="date" name="to_date" id="to_date" value="" onchange="toDate(this.value)" class="form-control shadow-none">
      </div>
      <div class="border bg-light p-3 rounded mb-3">
        <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
        @foreach($facilities as $fKey => $fValue)
        <div class="mb-2">
          <input type="checkbox" id="f1" name="facilities[]" value="{{$fValue->name}}" class="form-check-input shadow-none me-1">
          <label class="form-check-label" for="f1">{{$fValue->name}}</label>
        </div>
        @endforeach
        <!-- <div class="mb-2">
          <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
          <label class="form-check-label" for="f2">Facility two</label>
        </div> -->
        <!-- <div class="mb-2">
          <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
          <label class="form-check-label" for="f3">Facility three</label>
        </div> -->
      </div>
      <div class="border bg-light p-3 rounded mb-3">
        <h5 class="mb-3" style="font-size: 18px;">Adults</h5>
        <div class="d-flex">
          <div class="me-2">
          <label class="form-label">Adults</label>
          <input type="number" name="adults" id="adults" class="form-control shadow-none">
        </div>
        <div>
          <label class="form-label">Children</label>
          <input type="number" name="childrens" id="childrens" class="form-control shadow-none">
        </div>
        </div>        
      </div>

      <div style="text-align: center;">
          <button type="button" class="btn btn-primary" onclick="searchDates()">Search</button>
      </div>

    </div>
  </form>
  </div>
</nav>
</div>


<div class="col-lg-9 col-md-12 px-4" id="search_data">
  @foreach($rooms as $keys => $values)
  <div class="card mb-4 border-0 shadow breakfast_box">
  <div class="row g-0 p-3 align-items-center">
      @php $image = json_decode($values->images,true) @endphp
      <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
        <img src="{{asset('public/storage/room/'.$image[0])}}" class="img-fluid rounded">
      </div>
      <div class="col-md-5 px-lg-3 px-md-3 px-0">
        <h5 class="mb-3">{{$values->title}}</h5>
        <div class="features mb-4">
            <h6 class="mb-1">Features</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap">
            {{$values->number_of_bed}} Rooms
            </span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">
            {{$values->number_of_bathroom}} Bathroom
            </span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">
            {{$values->is_balcony}} Balcony
            </span>
            <!-- <span class="badge rounded-pill bg-light text-dark text-wrap">
              3 Sofa
            </span> -->
          </div>
          <div class="Facilities mb-3">
            <h6 class="mb-1">Facilities</h6>
            @foreach(json_decode($values->facilities,true) as $faKey => $faValue)
            <span class="badge rounded-pill bg-light text-dark text-wrap">
              {{$faValue}}
            </span>
            @endforeach
            
          </div>
          <div class="guests">
            <h6 class="mb-1">Guests</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap">
            {{$values->adults}} Adults
            </span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">
            {{$values->childrens}} Children
            </span>
          </div>  
    </div>
    <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
      <h6 class="mb-4">{{$values->price}} per night </h6>
      <a href="{{route('room_booking',$values->slug)}}" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
      <a href="{{route('roomDetails',$values->id)}}" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>
    </div>
  </div>  
</div>
@endforeach
</div>

<div class="view_btn_box d-flex justify-content-center">
        <a href="" class="btn book_btn" id="loadMore"> <p> view more</p></a>
  </div>
  </div>


</div>
