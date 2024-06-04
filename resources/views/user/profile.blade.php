@extends('user.layouts.header')
@section('content')

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
                      <h2 class="head_caption">Profile</h2>
                      <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item">
                          <a href="{{url('/')}}"class="nav-link me-5">
                            Go to Home
                          </a>
                        </li>
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
                    <div class="card">
                      <div class="card-body">
                        <div class="logForm_box_main">
                        <form action="{{route('edit_profile')}}" method="post" enctype="multipart/form-data" class="logSign_form">
                            @csrf
                                <div class="logo_box">
                                    <a href="index.php"><img src="{{asset('public/images/questinn_logo_white.png')}}" width="40px" alt="" srcset="" class="img-fluid"></a>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" required="" value="{{$user->name}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" required="" value="{{$user->email}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
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
                                    <div class="col-sm-6">
                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-3">
                                                    <label for="" class="form-label">ID Photo</label>
                                                    <input type="file" name="id_proff" class="form-control" name="img">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-3">
                                                    <img src="{{asset('public/storage/profile/'.$user->picture)}}" width="80px;"> 
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!--<div class="form-group mb-3">-->
                                        <!--    <label for="" class="form-label">ID Photo</label>-->
                                        <!--    <input type="file" name="id_proff" class="form-control" name="img">-->
                                        <!--    <img src="{{asset('public/storage/profile/'.$user->picture)}}" width="80px;"> -->
                                        <!--</div>-->
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Mobile</label>
                                            <input type="tel" class="form-control" name="phone" required=""  value="{{$user->phone_no}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" required="" value="{{$user->address}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="pwd" placeholder="Password" required>
                                            <span id="passwordId" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
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
              </div>
           
           
              <!-- content-wrapper ends -->
          </div>
          @endsection


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