@include('inc.header')
<section class="home_carousel food_home">
	<div class="swiper home_swiper">
      <div class="swiper-wrapper">
        @foreach($banner as $key => $values) 
                <div class="swiper-slide home_slide" style="background:url({{asset($values->banner)}});">
                    <div class="overlay"></div>
                </div>
        @endforeach
			<!-- <div class="swiper-slide home_slide" style="background:url(images/Foods/breakfast/breakfast-1.jpg);">
				<div class="overlay"></div>
			</div>
			<div class="swiper-slide home_slide" style="background:url(images/Foods/plate-delicious-chili-fried-chicken.jpg);">
			<div class="overlay"></div>

			</div>
			<div class="swiper-slide home_slide" style="background:url(images/Foods/delicious-indian-food-tray.jpg);">
			<div class="overlay"></div>

			</div> -->
			
		</div>
	</div>
	<div class="food_bg_text">
		<h1>food details</h1>
  </div>
</section>

<section class="details_rooms">
    <div class="container">
        <div class="row">
        @php $subtotal = 0; @endphp
        @php $tax = 0; @endphp
        @php $discount = 0; @endphp    
        @if(request()->session()->has('cart'))
        @php $cart = request()->session()->get('cart');   @endphp
        @php $total_amount = 0; @endphp
        
            <table class="table border cart_table">
                <thead>
                    <tr>
                        <td>Product</td>
                        <td>Product Name</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                        <td class="text-center">Delete Item</td>
                    </tr>
                </thead>
                <tbody>
                
                @foreach($cart as $cartKey => $cartValue)      
                @php $product = DB::table('food')->where('id',$cartValue['product_id'])->first(); @endphp  
                    <tr id="removeTableRow">
                        <td>
                            <img src="{{asset('public/storage/foods/'.$product->image)}}" alt="" class="img-fluid">
                        </td>
                        <td><p class="mb-0">{{$product->name}}</p></td>
                        <td><i class="bi bi-currency-rupee"></i>{{$cartValue['amount']}}</td>
                        <td>
                            <select name="" class="table_select" id="" onchange="cartQuantity_change({{$cartValue['product_id']}},this.value)">
                                <option value="1" @selected($cartValue['quantity'] == 1)>1</option>
                                <option value="2" @selected($cartValue['quantity'] == 2)>2</option>
                                <option value="3" @selected($cartValue['quantity'] == 3)>3</option>
                                <option value="4" @selected($cartValue['quantity'] == 4)>4</option>
                                <option value="5" @selected($cartValue['quantity'] == 5)>5</option>
                                <option value="6" @selected($cartValue['quantity'] == 6)>6</option>
                                <option value="7" @selected($cartValue['quantity'] == 7)>7</option>
                                <option value="8" @selected($cartValue['quantity'] == 8)>8</option>
                                <option value="9" @selected($cartValue['quantity'] == 9)>9</option>
                                <option value="10" @selected($cartValue['quantity'] == 10)>10</option>
                            </select>
                        </td>
                        <td><i class="bi bi-currency-rupee"></i>{{$cartValue['amount']}}</td>
                        <td class="text-center">
                            <!-- <button class="btn bg-transparent" id="removBtn" onclick="remove_cart({{$cartValue['product_id']}})"><i class="bi bi-x"></i></button> -->
                            <button class="btn bg-transparent"  onclick="remove_cart({{$cartValue['product_id']}})"><i class="bi bi-x"></i></button>
                        </td>
                    </tr>
                    @php $subtotal += $cartValue['amount']; @endphp
                @endforeach   
                </tbody>
            </table>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <form action="" class="cart_detail_view">
                        <div class="input_box d-flex flex-column">
                            <label for="">Order note (Optional)</label>
                            <textarea name="" id="" cols="30" rows="10"></textarea>
                            <!-- <a href="{{url()->previous()}}" class="text-left btn">Continue Shoping</a> -->
                            <div class="text-left">
                            <a href="{{route('food')}}" class="btn mt-5">Continue Shoping</a>
                            </div>
                        </div>
                    </form>
                </div>                
                <div class="col-lg-6">
                    <div class="card cart_details_cart">
                        <div class="card-body p-0">
                            <div class="card-header cart_header">
                                <h5 class="card-title text-center pt-3 cart_details_heading">Cart totals</h5>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center py-3 px-3">
                                <span>Sub total</span>
                                <span><i class="bi bi-currency-rupee"></i>{{$subtotal}}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center py-3 px-3">
                                <span>Tax</span>
                                <span><i class="bi bi-currency-rupee"></i>{{$tax}}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center py-3 px-3">
                                <span>Discount</span>
                                <span><i class="bi bi-currency-rupee"></i>{{$discount}}</span>
                            </div>
                            @php $total = ($subtotal+$tax) - $discount; @endphp
                            <div class="d-flex justify-content-between align-items-center py-3 px-3 border">
                                <span>Total</span>
                                <span><i class="bi bi-currency-rupee"></i>{{$total}}</span>
                            </div>
                            
                            <div class="d-flex justify-content-between flex-column align-items-center py-3 px-3 cart_detail_view">
                                <span><i class="bi bi-currency-rupee"></i>{{$total}}</span>
                                <a href="{{route('food_payment')}}" class="btn">Place Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body food_cart_body">
                            <p class="elig_para"><i class="bi bi-check-circle-fill"></i> Your order is eligible for FREE Delivery. Select this option at checkout. Details</p>
                            <h5 class="card-title">Subtotal (1 items):<i class="bi bi-currency-rupee"></i> 2000</h5>
                            <a href="order_details.php" class="card-link btn book_btn"><p>Place Order</p></a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
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

<script>
    var $button1 = $('.increment_btn')
    var $counter_one = $('.counter_one');
    $button1.click(function(){
      $counter_one.val( parseInt($counter_one.val()) + 1 ); // `parseInt` converts the `value` from a string to a number
    });
</script>

<script>
    var $button1 = $('.increment_btn')
    var $counter_one = $('.counter_one');
    $button1.click(function(){
      $counter_one.val( parseInt($counter_one.val()) + 1 ); // `parseInt` converts the `value` from a string to a number
    });
</script>

<script>
    const removeTableRow = document.getElementById('removeTableRow');
    const removBtn = document.getElementById('removBtn');
    removBtn.onclick = () =>{
        removeTableRow.classList.toggle('removeRow')
    }

</script>

@include('inc.footer')


</body>
</html>