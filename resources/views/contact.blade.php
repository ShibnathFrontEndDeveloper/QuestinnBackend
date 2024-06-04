


@include('inc.header')

<section class="home_carousel food_home">
	<div class="swiper home_swiper">
      <div class="swiper-wrapper">
			<!-- <div class="swiper-slide home_slide" style="background:url(images/patrick-robert-doyle-AH8zKXqFITA-unsplash.jpg);">
				<div class="overlay"></div>
			</div> -->
			<!-- <div class="swiper-slide home_slide" style="background:url(images/rooms/IMG_39782.png);">
			<div class="overlay"></div> -->    
			<!-- </div> -->
      @foreach($banner as $keys => $values)
			<div class="swiper-slide home_slide" style="background:url(<?php echo $values->banner ?>);">
			<div class="overlay"></div>
			</div>
      @endforeach
		</div>
	</div>
	<div class="food_bg_text">
		<h1>contact</h1>
  </div>
</section>

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">CONTACT US</h2>

  <div class="h-line bg-dark"></div>
  <p class="text-center mt-3">
  {{$details->title}}
  </p>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4">
          <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3707.8329294354226!2d87.71776337432526!3d21.670355565435344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0325226a2cb075%3A0xa3cf0ee02fdab3e6!2sQUEST%20INN%20BEACH%20RESORT!5e0!3m2!1sen!2sin!4v1705294762734!5m2!1sen!2sin"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <!--<iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63225.996807740055!2d80.97815907936754!3d7.934196847392783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afb456e05e5a4c9%3A0x72cd1cfea9d4d0a9!2sPolonnaruwa%20Ancient%20City!5e0!3m2!1sen!2slk!4v1659525623039!5m2!1sen!2slk" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
        <h5>Address</h5>
        <a href="https://goo.gl/maps/jFdoRUnTvq314zJy6" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
          <i class="bi bi-geo-alt-fill"></i>{{$details->address}}.
        </a>
        <h5 class="mt-4">Call us</h5>
        <a href="tel: +{{$details->phone}}" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>{{$details->phone}}</a>
        <br>
        <a href="tel: +{{$details->phone}}" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>{{$details->phone}}</a>
        <h5 class="mt-4">Email</h5>
        <a href="mailto: {{$details->email}}" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-envelope-fill"></i>{{$details->email}}</a>

        <h5 class="mt-4">Follow us</h5>
        <a href="#" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-twitter me-1"></i>
        </a>
        
        <a href="#" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-facebook me-1"></i>
        </a>
        
        <a href="#" class="d-inline-block text-dark fs-5">
          <i class="bi bi-instagram me-1"></i>
          
        </a>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4">

        <form action="{{route('add.contact')}}" method="POST">
          @csrf
          <h5>Send a message</h5>
          <div class="mb-3">
          <label class="form-label" style="font-weight: 500;">Name</label>
          <input type="text" class="form-control shadow-none" name="name" required>
          </div>
          <div class="mb-3">
          <label class="form-label" style="font-weight: 500;">Email</label>
          <input type="email" class="form-control shadow-none" name="email" required>
          </div>
          <div class="mb-3">
          <label class="form-label" style="font-weight: 500;">Subject</label>
          <input type="text" class="form-control shadow-none" name="subject" required>
          </div>
          <div class="mb-3">
          <label class="form-label" style="font-weight: 500;">Message</label>
          <textarea class="form-control shadow-none" name="message" rows="5" style="resize: none;" required></textarea>
          </div>
          <button type="submit" class="btn text-white custom-bg mt-3">Send</button>
        </form>
      </div>
    </div>
</div>
    
  </div>
</div>


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

@include('inc.footer')


</body>
</html>