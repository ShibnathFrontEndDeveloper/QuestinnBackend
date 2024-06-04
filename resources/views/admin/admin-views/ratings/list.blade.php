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
                      <th scope="col">Customer name</th>
                      <th scope="col">Customer Email</th>
                      <th scope="col">Ratings</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($ratings as $key => $value)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$value->users->name}}</td>
                      <td>{{$value->users->email}}</td>                                                        
                      <td>{{$value->ratings}}</td>                                        
                    </tr>
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