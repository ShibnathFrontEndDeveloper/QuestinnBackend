
@extends('user.layouts.header')
@section('content')
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
                      <h2 class="head_caption">Room Details</h2>
                      <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item">
                          <a href="{{url('/')}}"class="nav-link me-5">
                            Go to Home
                          </a>
                        </li>                      
                        <li class="dropdown profil_dtl_menu_dropDown ">
                          <button class="btn btn-primary profil_dtl_menu" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        @php $name = explode(' ',Auth::User()->name) @endphp
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
                    <div class="card">
                      <div class="card-body">
                        <div class="table table-responsive tbl_content">
                          <!-- <table class="table align-middle  table-hover">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Room No.</th>
                                <th scope="col">Room Name</th>
                                <th scope="col">Facilities</th>
                                <th scope="col">Price</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Night Stay</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                              <td scope="col">
                                <img src="dasboard-assets/images/IMG_65019.png" class="img-fluid cmd_img">
                              </td>
                                <td scope="col">001</td>
                                <td scope="col">Single Room</td>
                                <td scope="col">
                                  <div class="dropdown cmd_dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                      Check
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                      <li><a class="dropdown-item" href="#">Ac   <span class="badge rounded-pill bg-warning text-dark">Yes</span></a></li>
                                      <li><a class="dropdown-item" href="#">Room Heater <span class="badge rounded-pill bg-warning text-dark">No</span></a></li>
                                      <li><a class="dropdown-item" href="#">Swimming Pool<span class="badge rounded-pill bg-warning text-dark">Yes</span></a></li>
                                    </ul>
                                  </div>
                                </td>
                                <td scope="col"><i class="bx bx-rupee"></i> 1500.00</td>
                                <td scope="col">Due</td>
                                <td scope="col">1 Night</td>
                              </tr>
                            </tbody>
                          </table> -->
                          <table class="table align-middle  table-hover">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Sl.</th>
                    <th scope="col">Room Name</th>
                    <th scope="col">Room No</th>
                    <th scope="col">Facilities</th>
                    <th>Price</th>
                    <th>Payment Method</th>
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
                      @if($roomValue->room_no != null)                        
                        {{implode(',',json_decode($roomValue->room_no,true))}}                      
                      @endif
                    </td>
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
                    <td><i class="bx bx-rupee"></i>{{$roomValue->payment_method}}</td>
                    <td>{{$roomValue->paid_status}}</td>
                    
                    <td>{{$roomValue->from_date}} to {{$roomValue->to_date}}</td>
                  </tr>
                  
                  @endforeach
                </tbody>
              </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- content-wrapper ends -->
          </div>
@endsection

