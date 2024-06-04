
@include('inc.header')
<!DOCTYPE html>
<html>
<head>
	<title>Questinn Beachresort Hotel</title>
	<!-- CSS only -->
    @include('inc.links')

<link rel="stylesheet" type="text/css" href="{{asset('public/css/common.css')}}">
<link rel="stylesheet" href="{{asset('public/css/dashboard.css')}}">

</head>
  

<body id="body-pd">
    <!--Container Main start-->
    <div class="container custom_contain">
      <div class="row">
        <div class="col-2 profile_list_box">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Room Details</button>
            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Order Details</button>
            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Edit Profile</button>
            <button class="nav-link" id="v-pills-settings-tab">Logout</button>
          </div>
        </div>
        <div class="col-10 cmd_table_Part">
          <div class="tab-content" id="v-pills-tabContent">
            
            <!-- Room Details Tap -->
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="col-lg-12">
              <table class="table table-striped cmd_table">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Sl.</th>
                    <th scope="col">Room Name</th>
                    <th scope="col">Facilities</th>
                    <th>Price</th>
                    <th>Payment</th>
                    <th>Period</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($roomOrders as $roomKey => $roomValue)
                  <tr>
                    @php
                    $image = json_decode($roomValue->rooms->images,true);
                    $roomFacility = json_decode($roomValue->rooms->facilities,true);
                    @endphp
                    <th scope="row"><img src="{{asset('public/storage/room/'.$image[0])}}" class="img-fluid cmd_img"></th>
                    <td>{{$roomKey+1}}</td>
                    <td>{{$roomValue->rooms->title}}</td>
                    <td>
                      <div class="dropdown cmd_dropdown">
                        <button class="btn btn-secondary dropdown-toggle toggle_btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Check
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        
                        @foreach($facilities as $facKey => $facValue)
                          <li><a class="dropdown-item" href="#">{{$facValue->name}}<span class="badge rounded-pill bg-warning text-dark"><?php foreach($roomFacility as $faKey => $faValue){
                           echo $facValue->name == $faValue ? 'yes' : '';
                          } ?></span></a></li>
                          <!-- <li><a class="dropdown-item" href="#">Room Heater <span class="badge rounded-pill bg-warning text-dark">No</span></a></li> -->
                          <!-- <li><a class="dropdown-item" href="#">Swimming Pool<span class="badge rounded-pill bg-warning text-dark">Yes</span></a></li> -->
                        @endforeach
                        </ul>
                      </div>
                    </td>
                    <td><i class="bx bx-rupee"></i>{{$roomValue->nett_amount}}</td>
                    <td>{{$roomValue->paid_status}}</td>
                    
                    <td>{{$roomValue->from_date}} to {{$roomValue->to_date}}</td>
                  </tr>
                  <!-- <tr>
                    <th scope="row"><img src="images/rooms/IMG_65019.png" class="img-fluid cmd_img"></th>
                    <td>001</td>
                    <td>Single Room</td>
                    <td>
                      <div class="dropdown cmd_dropdown">
                        <button class="btn btn-secondary dropdown-toggle toggle_btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Check
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><a class="dropdown-item" href="#">Ac   <span class="badge rounded-pill bg-warning text-dark">Yes</span></a></li>
                          <li><a class="dropdown-item" href="#">Room Heater <span class="badge rounded-pill bg-warning text-dark">No</span></a></li>
                          <li><a class="dropdown-item" href="#">Swimming Pool<span class="badge rounded-pill bg-warning text-dark">Yes</span></a></li>
                        </ul>
                      </div>
                    </td>
                    <td><i class="bx bx-rupee"></i> 1500.00</td>
                    <td>Due</td>
                    <td>1 Night</td>
                  </tr>
                  <tr>
                    <th scope="row"><img src="images/rooms/IMG_65019.png" class="img-fluid cmd_img"></th>
                    <td>001</td>
                    <td>Single Room</td>
                    <td>
                      <div class="dropdown cmd_dropdown">
                        <button class="btn btn-secondary dropdown-toggle toggle_btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Check
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><a class="dropdown-item" href="#">Ac   <span class="badge rounded-pill bg-warning text-dark">Yes</span></a></li>
                          <li><a class="dropdown-item" href="#">Room Heater <span class="badge rounded-pill bg-warning text-dark">No</span></a></li>
                          <li><a class="dropdown-item" href="#">Swimming Pool<span class="badge rounded-pill bg-warning text-dark">Yes</span></a></li>
                        </ul>
                      </div>
                    </td>
                    <td><i class="bx bx-rupee"></i> 1500.00</td>
                    <td>Due</td>
                    <td>1 Night</td>
                  </tr> -->
                  @endforeach
                </tbody>
              </table>
              </div>
            </div>

            <!-- Food Details Tap -->
            
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <div class="card">
                  <div class="card-body">
                  <div class="d-flex justify-content-between card_border">
                    <div class="ing_food_dtls">
                      <div class="imgBox_part">
                        <img src="images/Foods/amirali-mirhashemian-ZSukCSw5VV4-unsplash.jpg" alt="" class="img-fluid">
                      </div>
                      <div class="foodDtls_box">
                        <h2 class="food_name">Questinn</h2>
                        <p class="room_number">Hotel Questinn Room Number 001</p>
                        <p class="order_id">order#1254 <span>Thu, Feb 9, 2023, 12:56 PM</span> </p>
                        <a href="#offcanvasExample" data-bs-toggle="offcanvas">view details</a>
                        <a href="#staticBackdrop" data-bs-toggle="modal">Rate us</a>
                      </div>
                      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          <h5 class="offcanvas_heading">Order #1254</h5>
                        </div>
                        <div class="offcanvas-body">
                          <div class="deliver_details">
                            <div class="delvr_detail_wrapper wrapper_box">
                              <div class="icon_box">
                                <i class="bx bx-map"></i>
                              </div>
                              <div class="para_d">
                                <h6>Tadoori Roti Chicken Varta</h6>
                                <p>mandarmani, West Bengal</p>
                              </div>
                            </div>
                            <div class="delvr_detail_wrapper pb-3">
                              <div class="icon_box">
                              <i class="bx bxs-arch"></i>
                              </div>
                              <div class="para_d para_b">
                                <h6>Hotel Questinn</h6>
                                <p>Room No.001, Sufal Biswas</p>
                              </div>
                            </div>
                          </div>
                          <div class="itemDtls_box">
                            <h5><span>1</span> item</h5>
                            <div class="dtls_wrrapar">
                              <div class="dtls_box">
                                <h6 class="hadding_h"><i class="bx bx-food-tag"></i>Tadoori Roti Chicken Varta</h6>
                              </div>
                              <div class="dtls_box">
                                <h6><i class="bx bx-rupee"></i>350.00</h6>
                              </div>
                            </div>
                          </div>
                          <div class="itemDtls_box">
                            <div class="dtls_wrrapar">
                              <div class="dtls_box">
                                <h6 class="hadding_h">item total</h6>
                              </div>
                              <div class="dtls_box">
                                <h6><i class="bx bx-rupee"></i>350.00</h6>
                              </div>
                            </div>
                            <div class="dtls_wrrapar">
                              <div class="dtls_box">
                                <h6>packaging charges</h6>
                              </div>
                              <div class="dtls_box">
                                <h6><i class="bx bx-rupee"></i>20.00</h6>
                              </div>
                            </div>
                            <div class="dtls_wrrapar">
                              <div class="dtls_box">
                                <h6>taxes</h6>
                              </div>
                              <div class="dtls_box">
                                <h6><i class="bx bx-rupee"></i>50.00</h6>
                              </div>
                            </div>
                          </div>
                          <div class="grandTtl_box">
                            <div class="allTxt_box">
                              <p>paid via online</p>
                            </div>
                            <div class="alltax_grand">
                              <div class="bill_big">
                                  <h5>Bill total</h5>
                              </div>
                              <div class="bill_amount">
                                  <h5><i class="bx bx-rupee"></i>420.00</h5>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="deivr_to">
                      <span>Delivered on Thu, Feb 9, 2023, 01:25 PM <i class="bx bx-check-circle"></i></span>
                    </div>
                  </div>
                    <div class="d-flex justify-content-between align-items-center pt-3">
                      <div class="qty_box "><p>Tadoori Roti Chicken Varta x<span> 1</span></p></div>
                      <div class="qty_box"><p><i class="bx bx-rupee"></i>350.00</p></div>
                    </div>
                  </div>
              </div>
            </div>

            <!-- Profile Edit Tap -->

            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
              <form action="{{route('edit_profile')}}" method="post" enctype="multipart/form-data" class="edit_form">
                  @csrf
                    <div class="row">
                      <div class="col-sm-4">
                          <div class="form-group mb-3">
                              <label for="" class="form-label">Name</label>
                              <input type="text" class="form-control" name="name" required="" value="{{$user->name}}" required>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group mb-3">
                              <label for="" class="form-label">Email</label>
                              <input type="email" class="form-control" name="email" required="" value="{{$user->email}}" required>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group mb-3">
                              <label for="" class="form-label">ID</label>
                                <select name="id_name" id="" class="form-select" required>
                                  <option value="pan_card" @selected('pan_card' == $user->id_name)>Pan Card</option>
                                  <option value="aadhar_card" @selected('aadhar_card' == $user->id_name)>Aadhaar Card</option>
                                  <option value="voter_card" @selected('voter_card' == $user->id_name)>Voter Card</option>
                                  <option value="driving_license" @selected('driving_license' == $user->id_name)>Driving Licence</option>
                                </select>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group mb-3">
                              <label for="" class="form-label">ID Photo</label>
                              <input type="file" name="id_proff" class="form-control" name="img">
                              <img src="{{asset('public/storage/profile/'.$user->picture)}}" width="80px;"> 
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group mb-3">
                              <label for="" class="form-label">Mobile</label>
                              <input type="tel" class="form-control" name="phone" required=""  value="{{$user->phone_no}}" required>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group mb-3">
                              <label for="" class="form-label">Address</label>
                              <input type="text" class="form-control" name="address" required="" value="{{$user->address}}" required>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group mb-3">
                              <label for="" class="form-label">Password</label>
                              <input type="password" name="password" class="form-control" id="pwd" placeholder="Password" required>
                              <span id="passwordId" class="text-danger"></span>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group mb-3">
                              <label for="" class="form-label">Confirm Password</label>
                              <input type="password" class="form-control" id="con_pwd" name="confirm_password" placeholder="Password" onkeyup="con_password(this.value)" required>
                              <span id="con_passwordId" class="text-danger"></span>
                          </div>
                      </div>
                  </div>
                  <div class="form-group mb-3">
                      <button type="submit" id="submitId" class="btn ">Update</button>
                  </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Rate us modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Give us Rates</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="smly_box">
              <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
              <lottie-player src="https://assets8.lottiefiles.com/datafiles/d2PQkkDcP77TPTeBzAx7iQMu6zJOARPXuafCB19k/success.json" background="transparent" speed="1" loop="" autoplay=""></lottie-player>
            </div>
            <div class="rate_box">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            </div>
            <form action="" class="rate_box">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option4">
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option5">
              </div>
              <div class="row">
                <div class="col-12 text-center my-4">
                <button type="submit" class="btn btn-primary rate_btn">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
      
    <!--Container Main end-->

    <script>
      let dropdown = document.querySelector('.dropdown-toggle');
      let dropmenu = document.querySelector('.dropdown-menu');
      dropdown.onclick =()=>{
        dropmenu.classList.toggle('show_menu');
      }


    </script>





@include('inc.footer')
<script>
    // var pressingEnter = false;
    function con_password(value){
        $(document).on({            
            keyup: function(e) {
                let password = document.getElementById('pwd').value;
                if (password) {
                    document.getElementById("passwordId").innerHTML = "";
                    if(value !== password){
                        document.getElementById("submitId").disabled = true;
                        document.getElementById("submitId").style.cursor = "no-drop";
                        document.getElementById("con_passwordId").innerHTML = "password not matched!";
                    }else {
                        document.getElementById("submitId").disabled = false;
                        document.getElementById("submitId").style.cursor = "";
                        document.getElementById("con_passwordId").innerHTML = "";                        
                    }
                }else {
                    document.getElementById("submitId").disabled = true;
                    document.getElementById("submitId").style.cursor = "no-drop";
                    document.getElementById("passwordId").innerHTML = "First set the password!";
                }  
            },
            click: function() {
                let password = document.getElementById('pwd').value;
                if (password) {
                    document.getElementById("passwordId").innerHTML = "";
                    if(value !== password){
                        document.getElementById("submitId").disabled = true;
                        document.getElementById("submitId").style.cursor = "no-drop";
                        document.getElementById("con_passwordId").innerHTML = "password not matched!";
                    }else {
                        document.getElementById("submitId").disabled = false;
                        document.getElementById("submitId").style.cursor = "";
                        document.getElementById("con_passwordId").innerHTML = "";
                    }
                }else {
                    document.getElementById("submitId").disabled = true;
                    document.getElementById("submitId").style.cursor = "no-drop";
                    document.getElementById("passwordId").innerHTML = "First set the password!";
                }  
            }
        });
                    
    }
</script>


</html>