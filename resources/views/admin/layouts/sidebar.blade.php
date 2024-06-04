<!DOCTYPE html>
<html lang="en">

<style>
 
  </style>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}"/>

  {{-- <title>Charts / ApexCharts - NiceAdmin Bootstrap Template</title> --}}
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="{{asset('public/images/faveicon.png')}}">
  <!--<link href="{{asset('public/assets/img/favicon.png')}}" rel="icon">-->
  <!--<link href="{{asset('public/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">-->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" rel="stylesheet"/>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
  <!-- Template Main CSS File -->
  <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  @include('admin.admin-views.modal.room_assign')
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{asset('public/images/questinn_logo_admin.png')}}" alt="">
        <!--<span class="d-none d-lg-block">Questinn</span>-->
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

       
        <!-- End Notification Nav -->

       
        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
           

            

            

            
             

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('admin.log_out')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      
      <!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.banner.addView')}}">
          <i class="bi bi-images"></i>
          <span>Banner</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.galleries.list')}}">
          <i class="bi bi-images"></i>
          <span>Gallery</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.brief.list')}}">
          <i class="bi bi-chat-square-text-fill"></i>
          <span>Questinn Brief</span>
        </a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.categories.list')}}">
          <i class="bi bi-door-closed-fill"></i>
          <span>Category</span>
        </a>
      </li> -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#orders-nav20" data-bs-toggle="collapse" href="#">
          <i class="bi bi-minecart"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="orders-nav20" class="nav-content collapse " data-bs-parent="#sidebar-nav">          
          <li>
            <a href="{{route('admin.categories.list')}}">
              <i class="bi bi-diagram-2"></i><span>Room Category</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.food_categories.list')}}">
              <i class="bi bi-diagram-2"></i><span>Food Category</span>
            </a>
          </li>                  
        </ul>
      </li>





      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.facilities.list')}}">
          <i class="bi bi-house-gear-fill"></i>
          <span>Facilities</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.users.list')}}">
          <i class="bi bi-person-plus-fill"></i>
          <span>Users</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.rooms.list')}}">
          <i class="bi bi-building-fill-check"></i>
          <span>Rooms</span>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.foods.list')}}">
          <i class="bi bi-cup-hot-fill"></i>
          <span>Foods</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.coupons.list')}}">
          <i class="bi bi-ticket-detailed-fill"></i>
          <span>Coupon</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.ratings.list')}}">
          <i class="bi bi-ticket-detailed-fill"></i>
          <span>Ratings</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.booking.room')}}">
          <i class="bi bi-cart-check-fill"></i>
          <span>Place a order</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.restaurants.list')}}">
          <i class="bi bi-shop"></i>
          <span>Restaurant</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#orders-nav2000" data-bs-toggle="collapse" href="#">
          <i class="bi bi-buildings-fill"></i><span>Room Order</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="orders-nav2000" class="nav-content collapse " data-bs-parent="#sidebar-nav">          
        <li>
          <a href="{{route('admin.roomorders.list','all')}}">
            <i class="bi bi-circle"></i><span>All</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.roomorders.list','pending')}}">
            <i class="bi bi-circle"></i><span>Pending</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.roomorders.list','confirmed')}}">
            <i class="bi bi-circle"></i><span>Confirmed</span>
          </a>
        </li>                 
        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#orders-nav2001" data-bs-toggle="collapse" href="#">
          <i class="bi bi-minecart"></i><span>Food Order</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="orders-nav2001" class="nav-content collapse " data-bs-parent="#sidebar-nav">          
        <li>
          <a href="{{route('admin.foods.food_orders')}}">
            <i class="bi bi-circle"></i><span>Orders</span>
          </a>
        </li>                        
        </ul>
      </li>





        <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-minecart"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#roomsorders-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-circle"></i><span>Rooms Orders</span>
            </a>
            <ul id="roomsorders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{route('admin.roomorders.list','all')}}">
                  <i class="bi bi-circle"></i><span>All</span>
                </a>
              </li>
              <li>
                <a href="{{route('admin.roomorders.list','pending')}}">
                  <i class="bi bi-circle"></i><span>Pending</span>
                </a>
              </li>
              <li>
                <a href="{{route('admin.roomorders.list','confirmed')}}">
                  <i class="bi bi-circle"></i><span>Confirmed</span>
                </a>
              </li> 
            </ul>                     
          </li> 

          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#foodsorders-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-circle"></i><span>Rooms Orders</span>
            </a>
            <ul id="foodsorders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="">
                  <i class="bi bi-circle"></i><span>All</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="bi bi-circle"></i><span>Pendings</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="bi bi-circle"></i><span>Process</span>
                </a>
              </li>  
              <li>
                <a href="">
                  <i class="bi bi-circle"></i><span>Complete</span>
                </a>
              </li> 
            </ul>
          </li>           
        </ul>
      </li> -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.testimonial.list')}}">
          <i class="bi bi-door-closed-fill"></i>
          <span>Testimonial</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#orders-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-minecart"></i><span>About</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="orders-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">          
          <li>
            <a href="{{route('admin.about.view')}}">
              <i class="bi bi-circle"></i><span>Content</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.about.management_team.list')}}">
              <i class="bi bi-circle"></i><span>Management Team</span>
            </a>
          </li>                  
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#orders-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-minecart"></i><span>Contact Us</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="orders-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">          
          <li>
            <a href="{{route('admin.contact_us.list')}}">
              <i class="bi bi-circle"></i><span>Contact List</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.contact_us.details.view')}}">
              <i class="bi bi-circle"></i><span>Contact Details</span>
            </a>
          </li>                  
        </ul>
      </li>
     
      {{-- <li class="nav-heading">Pages</li> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li> --}}

      

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    
    <div class="pagetitle">
      <h1>Quest inn</h1>
      <nav>
        <ol class="breadcrumb">
          {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
          <li class="breadcrumb-item">{{request()->segment(1)}}</li> 
          <li class="breadcrumb-item active">{{request()->segment(2)}}</li>
          @if(!empty(request()->segment(3)))
          <li class="breadcrumb-item active">{{request()->segment(3)}}</li>
          @endif
          @if(!empty(request()->segment(4)))
          <li class="breadcrumb-item active">{{request()->segment(4)}}</li>
          @endif
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @yield('content')
  

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    {{-- <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div> --}}
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      <!-- Designed by <a href="#">Sapco Iot Pvt Ltd</a> -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('public/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('public/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('public/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/solid.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
  

  <!-- Template Main JS File -->
  <script src="{{asset('public/assets/js/main.js')}}"></script>
  
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });
</script>

<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
      } );
</script>

<script>
    var number = 0;
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });
    });



  function foodcategory(value) {
    //   document.getElementById("demo").innerHTML = "Hello World";   
    // data:'_token = <?php //echo csrf_token() ?>',
    localStorage.setItem("category", value);
    $.ajax({
        type:'POST',
        url:'{{route("admin.restaurant.select_foods")}}',
        data: {
            "_token": "{{ csrf_token() }}",
            "id": value
            },
        
        success:function(data) {
        console.log(data.data);
        var json_decode = data.data;
        // console.log(json_decode);
        var html = '<option value="">Select</option>';

        json_decode.forEach(function(item,keys) {
          html += '<option value="'+item.id+'">'+item.name+'</option>';
        }); 
                    
        $('#select2Multiple'+number).html(html);        
        }
    });
  }  

  function addSection(){ 
            number++;  
            let category = localStorage.getItem("category");            
            
              var html = '<div class="row mb-3" id="dynamicAddRemove">';
                // html += '<label for="inputEmail3" class="col-sm-2 col-form-label">Foods:</label>'
                // html +=  '<div class="col-sm-3">';                                                                                                             
                // html +=    '<select class="select2-multiple form-control" id="select2Multiple'+number+'" name="food_ids" data-live-search="true">';
                // html +=    '<option value="" selected disabled>select</option>';                                    
                // html +=    '</select>';                       
                // html +=    '@if ($errors->has('foodCat_id'))';
                // html +=     '<span class="text-danger">{{ $errors->first('foodCat_id') }}</span>';
                // html +=    '@endif';
                // html +=  '</div>';

                html += '<label for="inputEmail3" class="col-sm-2 col-form-label">Foods:</label>'
                html +=  '<div class="col-sm-3">';                                                                                                                        
                html += '<input type="text" class="form-control" name="items[]"  placeholder="Enter item name" value="">  ';                                           
                html +=  '<span class="text-danger"></span>';                
                html += '</div>';
                        
                html +=  '<div class="col-sm-3">'                                                                                                             
                html +=  '<input type="number" class="form-control @error('amount') is-invalid @enderror" name="qty[]" placeholder="Enter Quantity" >';                           
                html +=  '@if ($errors->has('qty'))';
                html +=  '<span class="text-danger">{{ $errors->first('qty') }}</span>';
                html +=  '@endif';
                html +=  '</div>';
              
                html +=  '<div class="col-sm-3">';                                                                                                             
                html +=  '<input type="number" class="form-control @error('amount') is-invalid @enderror" id="foodPrice'+number+'" name="amount[]" placeholder="Enter amount" >';                           
                html +=  '@if ($errors->has('amount'))';
                html +=  '<span class="text-danger">{{ $errors->first('amount') }}</span>';
                html +=  '@endif';
                html +=  '</div>';

                html += '<div class="text-center col-sm-1">';
                html += '<button type="button" id="removes" class="btn btn-danger form-control">Remove</button></button>';        
                html += '</div>';
                html += '</div>';

                
                $("#dynamicCastBody").append(html);
                var remove = '#removes'
                $(document).on('click', remove, function () {						
                  $(this).parents("#dynamicAddRemove").remove();        	
                });	
                
                // foodcategory(category);
            
            
  }

  function foods(foodId){      
      $.ajax({
        type:'POST',
        url:'{{route("admin.restaurant.foodAmount")}}',
        data: {
            "_token": "{{ csrf_token() }}",
            "id": foodId
            },
        
        success:function(data) {          
          document.getElementById("foodPrice"+number).value = data.data;          
        }
    });
  }

  function qty_uodate(qty){
    let prvAmount = document.getElementById("foodPrice").value;
    let amount = qty * prvAmount;
    document.getElementById("foodPrice").value = amount;
  }  
</script>

<script>
  $(document).ready(function (e) {
    localStorage.clear('category');
  }); 
  </script>







</body>

</html>