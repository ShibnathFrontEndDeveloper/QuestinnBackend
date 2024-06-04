

@include('inc.header')
<section class="home_carousel food_home">
	<div class="swiper home_swiper">
      <div class="swiper-wrapper">
			@foreach($banner as $keys => $values) 
			<div class="swiper-slide home_slide" style="background:url(<?php echo $values->banner ?>);">
				<div class="overlay"></div>
			</div>
      @endforeach
			<!-- <div class="swiper-slide home_slide" style="background:url(images/Foods/food_banner_2.png);">
			<div class="overlay"></div>

			</div> -->
			<!-- <div class="swiper-slide home_slide" style="background:url(images/Foods/food_banner_3.png);">
			<div class="overlay"></div>

			</div> -->
			
		</div>
	</div>
	<div class="food_bg_text">
		<h1>food</h1>
  </div>
</section>

@foreach($food as $keys => $value)
<section class="food" id="food_sec">
  <div class="container">    
    <h1>{{$value->name}}</h1>
    <div class="swiper food_swiper">
      <div class="swiper-wrapper">      
        @foreach($value->foods as $fKeys => $fValues)
        
        <div class="swiper-slide">
        <form id="add-to-cart-foods{{$keys}}{{$fKeys}}">
          <div class="food_box">
            <img src="{{asset('public/storage/foods/'.$fValues->image)}}" alt="" class="img-fluid">
            <h5>{{$fValues->name}}</h5>    
            <input type="hidden" name="product_name" value="{{$fValues->name}}" >        
            <span id="chosen_price{{$keys}}{{$fKeys}}"><i class="bi bi-currency-rupee"></i>{{$fValues->amount}}</span>
            <input type="hidden" name="price" value="{{$fValues->amount}}" id="chosen_price1{{$keys}}{{$fKeys}}">
            <div class="d-flex align-items-center">   
              <button type="button" class="decrement_btn" onclick="dec_quantity('<?php echo 1 ?>','<?php echo $keys.$fKeys ?>','<?php echo $fValues->amount ?>')"><i class="bi bi-file-minus"></i></button>     
              <input type="text" name="quantity" value="1" id="food_cart_quantity{{$keys}}{{$fKeys}}" class="counter_one form-control"/>
              <button type="button" class="increment_btn" onclick="inc_quantity('<?php echo 1 ?>','<?php echo $keys.$fKeys ?>','<?php echo $fValues->amount ?>')"><i class="bi bi-plus"></i></button>
              <div class="order_box">                
                @if(Auth::User() && Auth::User()->check_in_status == 1)
                <button type="button"class="order_btn" onclick="buy_now('<?php echo $fValues->id ?>','<?php echo $keys.$fKeys ?>')">add to item</button>
                @else
                <button type="button"class="order_btn" onclick="buy_now('<?php echo 'unauthenticate' ?>','<?php echo 0 ?>')">add to item</button>
                @endif
              </div>  
            </div>         
          </div>
          </form>
        </div>        
        @endforeach         
      </div>
    </div>
      <div class="view_btn_box d-flex justify-content-end">
        <a href="{{url('foods/'.$value->id)}}" class="text-right btn book_btn"> <p> view more</p></a>
      </div>    
  </div>  
</section>
@endforeach

@include('inc.footer')

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

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

      var swiper = new Swiper(".food_swiper", {
      slidesPerView: 4,
      spaceBetween: 40,
      // autoplay:{
      //   delay: 2500,
      //   disableOnInteraction: false,
      // },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        
       425:{
        slidesPerView: 1,
      spaceBetween: 10,
       },
       768:{
        slidesPerView: 2,
      spaceBetween: 20,
       },
       1024:{
        slidesPerView: 3,
      spaceBetween: 30,
       },
       1440:{
        slidesPerView: 4,
      spaceBetween: 40,
       }
      },
    });

    var swiper = new Swiper(".food_swiper1", {
      slidesPerView: 4,
      spaceBetween: 40,
      // autoplay:{
      //   delay: 3000,
      //   disableOnInteraction: false,
      // },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        
       425:{
        slidesPerView: 1,
      spaceBetween: 10,
       },
       768:{
        slidesPerView: 2,
      spaceBetween: 20,
       },
       1024:{
        slidesPerView: 3,
      spaceBetween: 30,
       },
       1440:{
        slidesPerView: 4,
      spaceBetween: 40,
       }
      },
    });

    var swiper = new Swiper(".food_swiper2", {
      slidesPerView: 4,
      spaceBetween: 40,
      // autoplay:{
      //   delay: 3500,
      //   disableOnInteraction: false,
      // },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        
       425:{
        slidesPerView: 1,
      spaceBetween: 10,
       },
       768:{
        slidesPerView: 2,
      spaceBetween: 20,
       },
       1024:{
        slidesPerView: 3,
      spaceBetween: 30,
       },
       1440:{
        slidesPerView: 4,
      spaceBetween: 40,
       }
      },
    });

    var swiper = new Swiper(".food_swiper3", {
      slidesPerView: 4,
      spaceBetween: 40,
      // autoplay:{
      //   delay: 4000,
      //   disableOnInteraction: false,
      // },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        
       425:{
        slidesPerView: 1,
      spaceBetween: 10,
       },
       768:{
        slidesPerView: 2,
      spaceBetween: 20,
       },
       1024:{
        slidesPerView: 3,
      spaceBetween: 30,
       },
       1440:{
        slidesPerView: 4,
      spaceBetween: 40,
       }
      },
    });


    

    

    
    // var $button1 = $('.increment_btn')
    // var $counter_one = $('.counter_one');
    
    // var $button2 = $('.incrementOne_btn');
    // var $counter2 = $('.counter_two');
    // var $button3 = $('.incrementTwo_btn');
    // var $counter3 = $('.counter_three');
    // var $button4 = $('.incrementThree_btn');
    // var $counter4 = $('.counter_four');
    // var $button5 = $('.incrementFour_btn');
    // var $counter5 = $('.counter_five');
    // var $button6 = $('.incrementFive_btn');
    // var $counter6 = $('.counter_six');

    // $button1.click(function(){
    //   $counter_one.val( parseInt($counter_one.val()) + 1 ); // `parseInt` converts the `value` from a string to a number
    // });


    // $button2.click(function(){
    //   $counter2.val( parseInt($counter2.val()) + 1 ); // `parseInt` converts the `value` from a string to a number
    // });

    //   $button3.click(function(){
    //   $counter3.val( parseInt($counter3.val()) + 1 ); // `parseInt` converts the `value` from a string to a number
    // });

    //   $button4.click(function(){
    //   $counter4.val( parseInt($counter4.val()) + 1 ); // `parseInt` converts the `value` from a string to a number
    // });

    //   $button5.click(function(){
    //   $counter5.val( parseInt($counter5.val()) + 1 ); // `parseInt` converts the `value` from a string to a number
    // });

    //   $button6.click(function(){
    //   $counter6.val( parseInt($counter6.val()) + 1 ); // `parseInt` converts the `value` from a string to a number
    // });

</script>

</body>
</html>