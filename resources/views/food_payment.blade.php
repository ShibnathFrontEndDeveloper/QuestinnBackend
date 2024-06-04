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

<section class="payment_page">
    <div class="container">
    <form action="{{route('food_payment_confirm')}}" method="POST">
    @csrf
      <div class="row">
          
        @php $subtotal = 0; @endphp
        @php $tax = 0; @endphp
        @php $discount = 0; @endphp    
        @if(request()->session()->has('cart'))
        @php $cart = request()->session()->get('cart');   @endphp
        @php $total_amount = 0; @endphp
        @foreach($cart as $cartKey => $cartValue)      
            @php $product = DB::table('food')->where('id',$cartValue['product_id'])->first(); @endphp 
            @php $subtotal += $cartValue['amount']; @endphp                        
        @endforeach        
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
                            
                            <div class="d-flex justify-content-between flex-column align-items-center py-3 px-3">
                                <span><i class="bi bi-currency-rupee"></i>{{$total}}</span>
                                <!-- <a href="{{route('food_payment')}}" class="btn">Place Order Now</a> -->
                            </div>                                                                                                              
                                <input type="hidden" name="room_no" id="hiidenRoomNo" value="{{$roomNo->room_no}}">                            
                        </div>
                    </div>
                </div>
      </div>
      @endif
      <div class="row">
          <div class="col-lg-6 mt-5">
              <div class="card mb-3 payment_card">
                  <div class="card-header">
                      <h4>Choose Pyament</h4>
                  </div>
                  @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                  <div class="card-body">
                      <form action="" class="payment_form">
                          <div class="form-check my-4">
                              <label for="onlone" class="form-control">
                                  <input class="form-check-input" type="radio" name="onlone" id="inlineRadio1" value="online" data-bs-toggle="modal" data-bs-target="#inlinePaymentFood" required>
                                  <label class="form-check-label d-flex align-items-center" for="inlineRadio1" data-bs-toggle="modal" data-bs-target="#inlinePaymentFood">
                                      <img src="{{asset('public/images/payment1.png')}}" alt="" class="pymnt_img">
                                      <p class="payment_caption">Online Payment</p>
                                  </label> 
                              </label>
                          </div>
                          
                          <div class="form-check my-4">
                              <label for="onlone" class="form-control">
                                  <input class="form-check-input" type="radio" name="onlone" id="inlineRadio2" value="cash" checked required>
                                  <label class="form-check-label d-flex align-items-center" for="inlineRadio2">
                                      <img src="{{asset('public/images/cashOnDelivery1.png')}}" alt="" class="pymnt_img">
                                      <p class="payment_caption" onclick="food_order({{Auth::User()->id}})">Cash On Delivery</p>
                                  </label> 
                              </label>
                          </div>
                          <div>
                            @if($errors->has('onlone'))
                              <div><span class="text-danger">{{ $errors->first('onlone') }}</span></div>
                            @endif
                          </div>
                          <div>
                            <div class="form-group mb-3">
                              <button type="submit" class="food_btn">Order Now</button>
                            </div> 
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      
    </form>
    </div>

</section>


<!--Food Payment Online Modal-->
<div class="modal fade questInnOnlinePayment_bar" id="inlinePaymentFood" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Food Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
      </div>
        <form action="{{route('food_payment_confirm')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="card mb-4">
              <div class="card-body">
                  <div class="d-flex justify-content-between align-items-top foodHeading">
                      <h1>{{Auth::User()->name}}(For Food Payment)</h1>
                      <span class="online_foodPy"><i class="bi bi-currency-rupee"></i>{{$total}}</span>
                  </div>
              </div>
          </div>
                <div class="scanStep_part">
                    <div class="scanBoxImage">
                        <h5>UPI QR Code</h5>
                        <img src="{{asset('public/images/scaner.webp')}}" width="150px">
                    </div>
                    
                    <div class="scanDetailsStep">
                        <div class="stepTextBox">
                            <h1>Step 1:</h1>
                            <p>Scan QR code or copy the UPI ID to your Phonepay,Paytm,Gpay or any UPI App</p>
                        </div>
                        <div class="stepTextBox mt-5">
                            <h1>Step 2:</h1>
                            <p>Input the amount and process your pyment through selected app</p>
                        </div>
                    </div>
                </div>
                <div class="stepTextBox">
                    <h1>Step 3:</h1>
                    <p>Once payment done, Enter 12 digit UTR number and click submit button to confirm the payment.
                    If you don't backfill UTR, 100% oif the deposit transaction will fail. Please be sure to backfill.</p>
                </div>
                <div class="col-md-12">
                    <input  class="form-control" name="transaction_id" placeholder="Enter your UTR/UPI Transaction ID/Challan/Reference Number" required>
                    <span>(Copy from banking app-enter currect number)</span>
                </div>
                <div class="mt-3 col-md-12">
                    <input type="file" name="scrnshot" placeholder="Enter your payment screenshot" class="form-control" required>
                    <input type="hidden" name="onlone" value="{{'online'}}" class="form-control" required>
                    <input type="hidden" name="room_no" id="hiidenRoomNo" value="{{$roomNo->room_no}}">        
                    <span>(Enter your payment screenshot)</span>
                </div>
                <button type="submit" class="btn btn-secondary mt-4">Payment</button>
            </div>
        </form>
    </div>
  </div>
</div>



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



@include('inc.footer')


</body>
</html>