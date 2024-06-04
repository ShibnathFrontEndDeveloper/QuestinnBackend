@extends('admin.layouts.sidebar')
@section('content')
    
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <!-- <h1>User</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home </a></li>                
                <li class="breadcrumb-item active">User List</li>
                </ol>
            </nav> -->
        </div>   
        <div>
        <!-- <a href="{{url('admin/customer_support/support_helpline_add')}}" type="button" class="btn btn-primary my-auto"><i class="ri-add-fill pe-1"></i>Add Support Helpline</a> -->
    </div>          
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-12">

            <div class="card">
              <div class="card-body" style="overflow-x: auto">
                <h5 class="card-title"></h5>
  
                <!-- Default Table -->
                <table class="table datatable table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Sl. No.</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Image Proof</th>
                      <th scope="col">Mobile</th>                      
                      <th scope="col">Address</th>
                      <th scope="col">Reg. Date</th>
                      <th scope="col">Check-In Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($list as $key => $value)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>                                                        
                      <td><img src="{{asset('public/storage/profile/'.$value->picture)}}" width="100px;" data-bs-toggle="modal" data-bs-target="#identityModal{{$key}}"></td>                                                        
                      <td>{{$value->phone_no}}</td>                                        
                      <td>{!!$value->address!!}</td>                                        
                      <td>{{$value->created_at->format('Y-m-d');}}</td>                                        
                      <td>
                        @if($value->check_in_status == 1) 
                        <a href="{{route('admin.users.status',['value' => 0, 'user_id' => $value->id])}}"><span class="badge bg-success">checked-in</span></a>
                        @else
                        <a href="{{route('admin.users.status',['value' => 1, 'user_id' => $value->id])}}"><span class="badge bg-danger">checked-out</span></a>
                        @endif
                      </td>                                        
                    </tr>
                    
                    <div class="modal fade" id="identityModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Proff</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <img src="{{asset('public/storage/profile/'.$value->picture)}}" width="350px">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bd-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    @endforeach
                  </tbody>
                </table>
                <!-- End Default Table Example -->
              </div>
            </div>
  
          </div>

        
      </div>
    </section>

  
  @endsection