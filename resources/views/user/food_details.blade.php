@extends('user.layouts.header')
@section('content')

<style>
    .food_moadl_wraper{
        width:100%;
        height:100%;
        background:rgba(0,0,0,0.1);
        display:flex;
        justify-content:center;
        align-items:center;
        position:fixed;
        top:0;
        left:0;
        z-index:1000000;
        display:none;
    }
    .food_modal_content{
        padding:30px;
        background:#fff;
        border-radius:10px;
        position:relative;
    }
    .close_modalBox{
        position:absolute;
        top:-11px;
        right:-8px;
        background:#0d6efd;
        width:30px;
        height:30px;
        display:flex;
        justify-content:center;
        align-items:center;
        border-radius:50%;
        cursor:pointer;
    }
    .close_modalBox span{
        color:#fff;
        font-size:16px;
    }
    .ing_food_dtls .foodDtls_box .btn{
        background: #3d47ff;
        padding: 4px 15px !important;
        color:#fff;
        border-radius:0px;
    }
    .openFoodBox{
        display:initial;
        background:rgba(0,0,0,0.5);
        width:100%;
        height:100%;
    }
   .openFoodBox .food_modal_content {
    padding: 30px;
    background: #fff;
    border-radius: 10px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>



<div class="main-panel">
    <div class="content-wrapper">
        <div class="row align-items-center">
          <nav class="border-bottom fixed-top header_horizental">
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch" id="horizontal">
              <button class="navbar-toggler d-none d-lg-block navbar-toggler align-self-center" type="button" data-toggle="minimize" id="navTogler">
              <svg id="Menu" xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                <rect id="Rectangle_18" data-name="Rectangle 18" width="34" height="34" fill="#fff" opacity="0"/>
                <g id="Group_38" data-name="Group 38" transform="translate(5 7)">
                  <rect id="Rectangle_15" data-name="Rectangle 15" width="17" height="3.529" rx="1.765" transform="translate(7)" fill="#fff"/>
                  <rect id="Rectangle_16" data-name="Rectangle 16" width="21" height="3.529" rx="1.765" transform="translate(3 7.766)" fill="#fff"/>
                  <rect id="Rectangle_17" data-name="Rectangle 17" width="24" height="3.529" rx="1.765" transform="translate(0 15.529)" fill="#fff"/>
                </g>
              </svg>
              </button>
              <button class="navbar-toggler d-lg-none d-sm-block navbar-toggler align-self-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" id="navTogler1">
                <svg id="Menu" xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                  <rect id="Rectangle_18" data-name="Rectangle 18" width="34" height="34" fill="#fff" opacity="0"/>
                  <g id="Group_38" data-name="Group 38" transform="translate(5 7)">
                    <rect id="Rectangle_15" data-name="Rectangle 15" width="17" height="3.529" rx="1.765" transform="translate(7)" fill="#fff"/>
                    <rect id="Rectangle_16" data-name="Rectangle 16" width="21" height="3.529" rx="1.765" transform="translate(3 7.766)" fill="#fff"/>
                    <rect id="Rectangle_17" data-name="Rectangle 17" width="24" height="3.529" rx="1.765" transform="translate(0 15.529)" fill="#fff"/>
                  </g>
                </svg>
              </button>
              <h2 class="head_caption">Food Details</h2>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item">
                  <a href="{{url('/')}}"class="nav-link me-5">
                    Go to Home
                  </a>
                </li>
                @php $user = DB::table('users')->where('id',Auth::User()->id)->first() @endphp
                <li class="dropdown profil_dtl_menu_dropDown ">
                  <button class="btn btn-primary profil_dtl_menu" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     @php $name = explode(' ',$user->name) @endphp
                          {{strtoupper(substr(@$name[0], 0, 1))}}{{strtoupper(substr (@$name[1], 0, 1))}}
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <div class="main_body">
          <div class="row">
            @if(count($order) > 0)
            @foreach($order as $key => $value)
            <div class="col-12 pb-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between card_border">
                            <div class="ing_food_dtls">                                                                                                                                                    
                                @php $foods = App\Models\Foods::where('id',@$value->food_orders_dtails[0]->foods_id)->first(); @endphp
                                <div class="imgBox_part">
                                    <img src="{{asset('public/storage/foods/'.@$foods->image)}}" alt="" class="img-fluid">
                                </div>
                                <div class="foodDtls_box">
                                    <h2 class="food_name">Questinn</h2>
                                    <p class="room_number">Hotel Questinn Room Number {{@$value->room_no}}</p>
                                    <p class="order_id">#{{$value->id}}<span>   {{date('d-M-Y',strtotime(@$value->created_at))}}</span> </p>
                                    <a href="#offcanvasRight" data-bs-toggle="offcanvas">view details</a>
                                    <button class="btn p-0" onclick="foodModalFun()">Rate Us</button>
                                </div>
                            </div>
                            <div class="food_moadl_wraper">
                                <div class="food_modal_content">
                                    <div class="close_modalBox" onclick="foodModalFun()"><span>X</span></div>
                                    <div class="smly_box">
                                      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                      <lottie-player src="https://assets8.lottiefiles.com/datafiles/d2PQkkDcP77TPTeBzAx7iQMu6zJOARPXuafCB19k/success.json"  background="transparent"  speed="1"  loop autoplay></lottie-player>
                                    </div>
                                    <div class="rate_box">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                    <form action="{{route('customers.rate_us')}}" method="POST" class="rate_box">
                                        @csrf
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" required>
                                    
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2" required> 
                                   
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="4" required>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="4" required>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="5" required>
                                  </div>
                                  <div class="row">
                                    <div class="col-12 text-center my-4">
                                    <button type="submit" class="btn btn-primary rate_btn">Send</button>
                                    </div>
                                  </div>
                                </form>
                                </div>
                            </div>
                            <div class="deivr_to">
                                <span>
                                    <i class='bx bx-check-circle'></i></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-3">
                        @foreach($value->food_orders_dtails as $detailsKey => $detailsValue) 
                        <div class="qty_box "><p>{{$detailsValue->foods->name}} x<span> {{$detailsValue->quantity}}</span></p></div>
                        @endforeach
                        <div class="qty_box"><p><i class='bx bx-rupee'></i>{{$value->total_amount}}</p></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12 pb-5">
                <div class="card">
                    <h4>No Order Found</h4>
                </div>
            </div>
            @endif
          </div>
        </div>
      </div>

      <!-- food canvas start -->
      @foreach($order as $key => $value)
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                <h5 class="offcanvas_heading">Order #{{$value->id}}</h5>
            </div>
            <div class="offcanvas-body">
                <div class="deliver_details">
                    <div class="delvr_detail_wrapper wrapper_box">
                        <div class="icon_box">
                            <i class='bx bx-map'></i>
                        </div>
                        @foreach($value->food_orders_dtails as $detailsKey => $detailsValue)
                        <div class="para_d">
                            <h6>{{$detailsValue->foods->name}}</h6>
                            <p>mandarmani, West Bengal</p>
                        </div>
                        @endforeach
                    </div>
                <div class="delvr_detail_wrapper pb-3">
                    <div class="icon_box">
                        <i class="bi bi-shop"></i>
                    </div>
                    <div class="para_d para_b">
                        <h6>Hotel Questinn</h6>
                        <p>Room No.{{$value->room_no}}, {{$value->users->name}}</p>
                    </div>
                </div>
            </div>
            @foreach($value->food_orders_dtails as $detailsKey => $detailsValue)
            <div class="itemDtls_box">
                <h5><span>{{$detailsValue->quantity}}</span> item</h5>
                <div class="dtls_wrrapar">
                    <div class="dtls_box">
                        <h6 class="hadding_h"><i class="bi bi-postage-fill"></i>{{$detailsValue->foods->name}}</h6>
                    </div>
                    <div class="dtls_box">
                        <h6><i class="bi bi-currency-rupee"></i>{{$detailsValue->amount}}</h6>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="itemDtls_box">
                <div class="dtls_wrrapar">
                    <div class="dtls_box">
                        <h6 class="hadding_h">item total</h6>
                    </div>
                    <div class="dtls_box">
                        <h6><i class="bi bi-currency-rupee"></i>{{$value->total_amount}}</h6>
                    </div>
                </div>
                <!-- <div class="dtls_wrrapar">
                    <div class="dtls_box">
                        <h6>packaging charges</h6>
                    </div>
                    <div class="dtls_box">
                        <h6><i class="bi bi-currency-rupee"></i>20.00</h6>
                    </div>
                </div> -->
                <!-- <div class="dtls_wrrapar">
                    <div class="dtls_box">
                        <h6>taxes</h6>
                    </div>
                    <div class="dtls_box">
                        <h6><i class="bi bi-currency-rupee"></i>50.00</h6>
                    </div>
                </div> -->
            </div>
            <div class="grandTtl_box">
                <!-- <div class="allTxt_box">
                    <p>paid via online</p>
                    </div> -->
                    <div class="alltax_grand">
                    <div class="bill_big">
                        <h5>Bill total</h5>
                    </div>
                    <div class="bill_amount">
                        <h5><i class="bi bi-currency-rupee"></i>{{$value->total_amount}}</h5>
                    </div>
                </div>
            </div>
        </div>
    @endforeach 
        <!-- food canvas end -->
    </div>
    <!-- content-wrapper ends -->
    
    <!-- Button trigger modal -->
    
          
          
          
          




<script>
    document.addEventListener("DOMContentLoaded", function(event) {
   
   const showNavbar = (toggleId, navId, bodyId, headerId) =>{
   const toggle = document.getElementById(toggleId),
   nav = document.getElementById(navId),
   bodypd = document.getElementById(bodyId),
   headerpd = document.getElementById(headerId)
   
      // Validate that all variables exist
      if(toggle && nav && bodypd && headerpd){
      toggle.addEventListener('click', ()=>{
      // show navbar
      nav.classList.toggle('view')
      // change icon
      toggle.classList.toggle('bx-x')
      // add padding to body
      bodypd.classList.toggle('body-pd')
      // add padding to header
      headerpd.classList.toggle('body-pd')
      });
    }
   }
   
   showNavbar('header-toggle','nav-bar','body-pd','header')
   
   /*===== LINK ACTIVE =====*/
   const linkColor = document.querySelectorAll('.nav_link')
   
   function colorLink(){
   if(linkColor){
   linkColor.forEach(l=> l.classList.remove('active'))
   this.classList.add('active')
   }
   }
   linkColor.forEach(l=> l.addEventListener('click', colorLink))
   });
   
   
   
   function foodModalFun(){
       let foodBox = document.querySelector('.food_moadl_wraper');
       foodBox.classList.toggle('openFoodBox');
   }
</script>

@endsection          