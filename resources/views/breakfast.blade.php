
@include('inc.header')
<section class="home_carousel food_home">
	<div class="swiper home_swiper">
      <div class="swiper-wrapper">
			@foreach($banner as $keys => $values) 
			<div class="swiper-slide home_slide" style="background:url({{asset($values->banner)}});">
				<div class="overlay"></div>
			</div>
      @endforeach
			<!-- <div class="swiper-slide home_slide" style="background:url(images/Foods/breakfast/breakfast-2.png);">
			<div class="overlay"></div>

			</div> -->
			<!-- <div class="swiper-slide home_slide" style="background:url(images/Foods/breakfast/breakfast-3.png);">
			<div class="overlay"></div>

			</div> -->
			
		</div>
	</div>
	<div class="food_bg_text">
		<h1>{{$food[0]->name}}</h1>
  </div>
</section>

<section class="food" id="food_sec">
  <div class="container">
 
    <div class="row">
   
    @foreach($food[0]->foods as $keys => $values)
      <div class="col-lg-4 col-sm-6 breakfast_box">
      <form id="add-to-cart-foodsabcd{{$keys}}">
        <div class="food_box">
            <img src="{{asset('public/storage/foods/'.$values->image)}}" alt="" class="img-fluid">
            <h5>{{$values->name}}</h5>
            <input type="hidden" name="product_name" value="{{$values->name}}" >
            <span id="chosen_price{{$keys}}"><i class="bi bi-currency-rupee"></i>{{$values->amount}}</span>
            <input type="hidden" name="price" value="{{$values->amount}}" id="chosen_price1{{$keys}}">
            <!-- <input type="hidden" name="price" value="{{$values->amount}}" id="chosen_price1abcd{{$keys}}"> -->
            <div class="d-flex align-items-center">
             <button type="button" class="decrement_btn" onclick="dec_quantity('<?php echo 1 ?>','<?php echo $keys ?>','<?php echo $values->amount ?>')"><i class="bi bi-file-minus"></i></button>
               <input type="text" value="1" name="quantity" class="counter_one form-control" id="food_cart_quantity{{$keys}}"/> 
              <!--<input type="text" value="1" name="quantity" class="counter_one form-control" id="food_cart_quantity{{$keys}}"/>-->
              <button type="button" class="increment_btn" onclick="inc_quantity('<?php echo 1 ?>','<?php echo $keys ?>','<?php echo $values->amount ?>')"><i class="bi bi-plus"></i></button>
              <div class="order_box">
                @if(Auth::User() && Auth::User()->check_in_status == 1)
                <button type="button"class="order_btn" onclick="buy_now('<?php echo $values->id ?>','<?php echo $keys ?>')">add to item</button>
                @else
                <button type="button"class="order_btn" onclick="buy_now('<?php echo 'unauthenticate' ?>','<?php echo 0 ?>')">add to item</button>
                @endif
                <!-- <button type="button" class="order_btn" onclick="buy_now('<?php echo $values->id ?>','<?php echo $keys ?>')">Add to item</button> -->
              </div>
            </div>
          </div>
        </form>
      </div>
    @endforeach

      <!-- <div class="col-lg-4 col-sm-6 breakfast_box">
        <div class="food_box">
            <img src="images/Foods/sandwich-cup-coffee-table.jpg" alt="" class="img-fluid">
            <h5>Jelly bread with orange juice</h5>
            <span><i class="bi bi-currency-rupee"></i>80</span>
            <form action="" class="d-flex align-items-center">
              <input type="text" value="1" class="counter_one form-control"/>
              <button type="button" class="increment_btn"><i class="bi bi-plus"></i></button>
              <div class="order_box">
                <button type="submit"class="order_btn">order now</button>
              </div>
            </form>
          </div>
      </div>
      <div class="col-lg-4 col-sm-6 breakfast_box">
        <div class="food_box">
            <img src="images/Foods/sandwich-cup-coffee-table.jpg" alt="" class="img-fluid">
            <h5>Jelly bread with orange juice</h5>
            <span><i class="bi bi-currency-rupee"></i>80</span>
            <form action="" class="d-flex align-items-center">
              <input type="text" value="1" class="counter_one form-control"/>
              <button type="button" class="increment_btn"><i class="bi bi-plus"></i></button>
              <div class="order_box">
                <button type="submit"class="order_btn">order now</button>
              </div>
            </form>
          </div>
      </div>
      <div class="col-lg-4 col-sm-6 breakfast_box">
        <div class="food_box">
            <img src="images/Foods/sandwich-cup-coffee-table.jpg" alt="" class="img-fluid">
            <h5>Jelly bread with orange juice</h5>
            <span><i class="bi bi-currency-rupee"></i>80</span>
            <form action="" class="d-flex align-items-center">
              <input type="text" value="1" class="counter_one form-control"/>
              <button type="button" class="increment_btn"><i class="bi bi-plus"></i></button>
              <div class="order_box">
                <button type="submit"class="order_btn">order now</button>
              </div>
            </form>
          </div>
      </div>
      <div class="col-lg-4 col-sm-6 breakfast_box">
        <div class="food_box">
            <img src="images/Foods/sandwich-cup-coffee-table.jpg" alt="" class="img-fluid">
            <h5>Jelly bread with orange juice</h5>
            <span><i class="bi bi-currency-rupee"></i>80</span>
            <form action="" class="d-flex align-items-center">
              <input type="text" value="1" class="counter_one form-control"/>
              <button type="button" class="increment_btn"><i class="bi bi-plus"></i></button>
              <div class="order_box">
                <button type="submit"class="order_btn">order now</button>
              </div>
            </form>
          </div>
      </div>
      <div class="col-lg-4 col-sm-6 breakfast_box">
        <div class="food_box">
            <img src="images/Foods/sandwich-cup-coffee-table.jpg" alt="" class="img-fluid">
            <h5>Jelly bread with orange juice</h5>
            <span><i class="bi bi-currency-rupee"></i>80</span>
            <form action="" class="d-flex align-items-center">
              <input type="text" value="1" class="counter_one form-control"/>
              <button type="button" class="increment_btn"><i class="bi bi-plus"></i></button>
              <div class="order_box">
                <button type="submit"class="order_btn">order now</button>
              </div>
            </form>
          </div>
      </div>
      <div class="col-lg-4 col-sm-6 breakfast_box">
        <div class="food_box">
            <img src="images/Foods/sandwich-cup-coffee-table.jpg" alt="" class="img-fluid">
            <h5>Jelly bread with orange juice</h5>
            <span><i class="bi bi-currency-rupee"></i>80</span>
            <form action="" class="d-flex align-items-center">
              <input type="text" value="1" class="counter_one form-control"/>
              <button type="button" class="increment_btn"><i class="bi bi-plus"></i></button>
              <div class="order_box">
                <button type="submit"class="order_btn">order now</button>
              </div>
            </form>
          </div>
      </div>
      <div class="col-lg-4 col-sm-6 breakfast_box">
        <div class="food_box">
            <img src="images/Foods/sandwich-cup-coffee-table.jpg" alt="" class="img-fluid">
            <h5>Jelly bread with orange juice</h5>
            <span><i class="bi bi-currency-rupee"></i>80</span>
            <form action="" class="d-flex align-items-center">
              <input type="text" value="1" class="counter_one form-control"/>
              <button type="button" class="increment_btn"><i class="bi bi-plus"></i></button>
              <div class="order_box">
                <button type="submit"class="order_btn">order now</button>
              </div>
            </form>
          </div>
      </div>
      <div class="col-lg-4 col-sm-6 breakfast_box">
        <div class="food_box">
            <img src="images/Foods/sandwich-cup-coffee-table.jpg" alt="" class="img-fluid">
            <h5>Jelly bread with orange juice</h5>
            <span><i class="bi bi-currency-rupee"></i>80</span>
            <form action="" class="d-flex align-items-center">
              <input type="text" value="1" class="counter_one form-control"/>
              <button type="button" class="increment_btn"><i class="bi bi-plus"></i></button>
              <div class="order_box">
                <button type="submit"class="order_btn">order now</button>
              </div>
            </form>
          </div>
      </div> -->
    </div>
    
      <div class="view_btn_box d-flex justify-content-center">
        <a href="" class="btn book_btn" id="loadMore"> <p> view more</p></a>
      </div>
  </div>
</section>

@include('inc.footer')
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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

    $(document).ready(function(){
      $(".breakfast_box").slice(0, 3).show();
      $("#loadMore").on("click", function(e){
        e.preventDefault();
        $(".breakfast_box:hidden").slice(0, 3).slideDown();
        if($(".breakfast_box:hidden").length == 0) {
          $("#loadMore").text("No Content").addClass("noContent");
        }
      });           
    })




    
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