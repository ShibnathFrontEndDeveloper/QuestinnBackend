@extends('admin.layouts.sidebar')
@section('content')



    <!-- <div class="pagetitle">
      <h1>Forget password user list</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Forget password user list</li>
        </ol>
      </nav>
    </div>End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">


        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Room No</h5>

              <!-- General Form Elements -->
              <form action="{{route('admin.rooms.add_room_no',$id)}}" method="POST">
               @csrf        
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Add Room No:</label>
                  <div class="col-sm-3">
                    <input type="number" class="form-control" name="room_no" placeholder="enter room no" required>
                  </div>

                  <!-- <label for="inputNumber" class="col-sm-2 col-form-label">User name:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="user_name" placeholder="enter username" required>
                  </div> -->
                </div>

                <div class="col-12">                
                    <button type="submit" class="btn btn-primary">Add</button>                                     
                    <!-- <a href="" class="btn btn-primary">refresh</a>              -->
                </div>
                                                                                                                
                <div class="row my-3">
                  <!-- <legend class="col-form-label col-sm-2 pt-0">Checkboxes</legend> -->
                  <div class="col-sm-10">

                    <!-- <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        Example checkbox
                      </label>
                    </div> -->

                    <!-- <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="accept" id="gridCheck2" >
                      <label class="form-check-label" for="gridCheck2">
                        check All
                      </label> 
                    @if(isset($username) && isset($date))
                      <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteAll('<?php echo $username ?>','<?php echo $date ?>')">delete</a>                     
                    @else
                    <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteAll(null,null)">delete</a>
                   @endif
                </div> -->
                    

                  </div>
                </div>
                                                
                
              </form><!-- End General Form Elements -->

            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Room No List</h5>
              
              
              <!-- <a class="btn btn-primary btn-sm edit" title="Edit property" style="cursor:pointer;"
            href="{{url('admin/customer_support/image_content')}}"><i class="ri-add-fill"></i>Add Support Helpline</a> -->
              <!-- Table with stripped rows -->
              <table class="table datatable table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Sl. No.</th>
                      <th scope="col">Room NO</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $keys => $values)
                    <tr>          
                      <td>{{$keys+1}}</td>
                      <td>{{$values->room_no}}</td>                                                                                                        
                      <td>{{ucfirst($values->status)}}</td>                                                                                                        
                      <td>                       
                      <a href="{{route('admin.rooms.delete_room_no',$values->id)}}"><span class="badge bg-danger">Delete</span></a>
                    </td>                                                                      
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<script>
    function deleteAll(username,date){

        const cb = document.querySelector('#gridCheck2');
        console.log(cb.checked);
        if(cb.checked == true){
            if(username != null){
                const cb = document.querySelector('#accept');
                var _token = $('meta[name="csrf-token"]').attr('content')
                $.ajax({
                url: "{{url('admin/manage_end_user/forget_password_users/allDelete')}}",
                type: 'get',
                data: {
                    username: username,
                    date:date, 
                    _token: _token, 
                },
                dataType: "json",
                success: function(data){
                        if(data.status == 'Successful'){
                            Swal.fire(
                            'Deleted successfully',
                            'You clicked the button!',
                            'success'
                            )
                            setTimeout(function () {
                            location.reload(true);
                            }, 2000);
                        }else {
                            Swal.fire(
                            'Something Went Wrong',
                            'You clicked the button!',
                            'error'
                            ) 
                        }
                    }
                });
            }else{                
                Swal.fire(
                    'Nothig to delete',
                    'You clicked the button!',
                    'error'
                )  
            }            
        }else {
            Swal.fire(
                'Check box unchecked',
                'You clicked the button!',
                'error'
            )  
        }            
    } 

</script>

  @endsection